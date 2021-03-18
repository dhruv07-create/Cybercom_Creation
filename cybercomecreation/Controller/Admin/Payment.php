<?php 
namespace Controller\Admin;
 ob_start();

\Mage::loadFileByClassName('Controller\\Core\\Admin');

class Payment extends \Controller\Core\Admin{

  private $payment='';
  protected $paymentObj=null;


  public function gridAction(){

       try {

            $layout=$this->getLayout();
            $layout->setTemplate('./View/core/layout/one_column.php');
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Payment\\Grid'),'grid');
           echo $layout->toHtml();

           } catch (Exception $e) {
           
             echo $e->getMessage();
           }
          

     }
    
  public function setModelObj($obj = null){
           
          if(!$obj){
           
           $obj=\Mage::getModel('Model\\Payment');
          
          }

        $this->paymentObj=$obj;
        return $this;  

   }

   public function getModelObj(){
    
       if(!$this->paymentObj){

          $this->setModelObj();
       }

       return $this->paymentObj;

   }


   public function setPaymentData($payment){
 
         $this->payment=$payment;

         return $this;

   }
   public function getPaymentData(){
 
         return $this->payment;

   }

   public function  formAction(){
    
       try{
            
            $rowData=\Mage::getModel('Model\\Payment');
            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Payment\\Edit')->setTableRow($rowData),'edit');
            echo $layout->toHtml();

      }catch(Exception $e){ 
        $e->getMessage(); 
      }

   }

   public function editAction()
   {

     try {
            $id=$this->getRequest()->getGet('id');
            $rowData=\Mage::getModel('Model\\payment');
            $rowData->load($id);
            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Payment\\Edit')->setTableRow($rowData),'contnt');
            echo $layout->toHtml();
   
      } catch (Exception $e) {
      
        $this->redirect('grid');      
     }

               	
   }
   public function saveAction()
   {
        try {
  
    if($this->getRequest()->isPost()){

       if($this->getRequest()->getPost('s')!=null){
            
             $message= \Mage::getModel('Model\\Admin\\Message');
             date_default_timezone_set('Asia/Kolkata');
             
              $pre=$this->getModelObj();
              
              if($id=$this->getRequest()->getGet('id')){

           $pre->setData($this->getRequest()->getPost('payment'));
           
           $primary=$pre->getPrimaryKey();
           
           $pre->$primary=$id;

          if($pre->save())
          {

          $message->setSuccess('Update Successfully');
          }       
          

           $this->redirect('grid');

         }else{
      
            $pre->setData($this->getRequest()->getPost('payment'));

            $pre->createddate = date("d-F-Y");

            if($pre->save())
            {

            $message->setSuccess('Insert Successfully');
            }
            $this->redirect('grid');

         }

       }
     }
   
   
      } catch (Exception $e) {
      
        $this->redirect('grid');      
     }
   }

   public function deleteAction()
   {
        try {
           
           $id=(int) $this->getRequest()->getGet('id');

           if(!$id){
            
              throw new Exception("Error Request Id");
            
           }

           $pre=\Mage::getModel('Model\\Payment');

           if($pre->delete($id))
           {
           $message=\Mage::getModel('Model\\Admin\\Message');
           $message->setSuccess('Delete Successfully'); 
           }
      
           $this->redirect('grid');

            } catch (Exception $e) {
          
              $this->redirect('grid');
         }

   }

}


?>