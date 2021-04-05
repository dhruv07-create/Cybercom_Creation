<?php
namespace Controller\Admin;
  ob_start();

  \Mage::loadFileByClassName("Controller\\Core\\Admin");
 

 class Customer extends \Controller\Core\Admin {

  private $customers=[];
  private $model_customer=null;

  public function gridAction(){

     try{
           $pager=\Mage::getController('Controller\Core\Pager');
           $id=$this->getRequest()->getGet('page');
           $pager->setCurrentPage($id);
           $layout=$this->getLayout();
           $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Customer\\Grid')->setPager($pager),'grid');
          echo $layout->toHtml();
      
   
      }catch (Exception $e){
       
       echo $e->getMessage();

   }
   
  }
  public function setModelObj($obj =null ){
 
     if(!$obj){
 
      $obj =\Mage::getModel('Model\\Customer');

     }
     $this->model_customer=$obj;
     return $this;

  }

  public function getModelObj(){
     
      if(!$this->model_customer){
       
         $this->setModelObj();

      } 

    return $this->model_customer;

  }


  public function setCustomer($w){

    $this->customers=$w;

    return $this;

  }

  public function getCustomer(){

    return $this->customers;

  }

  public function formAction(){

    try{

           $rowData=\Mage::getModel('Model\\Customer');
           $layout=$this->getLayout();
           $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Customer\\Edit')->setTableRow($rowData),'Content');
           
        
          $this->renderLayout();

    }catch(Exception $e)
    {
        echo $e->getMessage();
    }

  }
   


  public function editAction(){

     try {
           $id=$this->getRequest()->getGet('id');
           $rowData=\Mage::getModel('Model\\Customer');
           $layout=$this->getLayout();
           $rowData->load($id); 
           $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Customer\\Edit')->setTableRow($rowData),'edit');
           echo $layout->toHtml();

          
     }catch (Exception $e) {

        $this->redirect('grid');
       
     }   

  }

  public function saveAction()
  {
      try {

           if($this->getRequest()->isPost()) 
           {

          if($this->getRequest()->getPost('add_sub')!=null)
            {         
                if($id1=$this->getRequest()->getGet('id'))
                {
                   $customer=\Mage::getModel('Model\Customer')->load($id1); 
                   if($this->getRequest()->getGet('t')=='a'){
                      $model=$this->getModelObj()->setTableName('customer_address')->setPrimaryKey('id');
                      $shipping=$this->getRequest()->getPost('shipping');

                      $model->setData($shipping);

                      $model->addresstype='shipping';
                      $model->customerId=$id1;
                      $model->firstname=$customer->firstname;
                      $model->save();

                      $model->unsetData();

                      $billing=$this->getRequest()->getPost('billing');

                      $model->setData($billing);

                      $model->addresstype='billing';
                      $model->customerId=$id1;
                      $model->firstname=$customer->firstname;

                      $model->save();
                      
                      $this->redirect('grid');

              }elseif ($this->getRequest()->getGet('t')=='u') {
                  
                  $model=$this->getModelObj()->setTableName('customer_address')->setPrimaryKey('id');


                  $shipping=$this->getRequest()->getPost('shipping');
                  $shipping['firstname']=$customer->firstname;

                  $model->update($shipping,['customerId'=>$id1,'addresstype'=>'shipping']);

                  $billing=$this->getRequest()->getPost('billing');
                  $billing['firstname']=$customer->firstname;
                  $model->update($billing,['customerId'=>$id1,'addresstype'=>'billing']);

                  $this->redirect('grid');
              }

              }

            } 
 

         date_default_timezone_set('Asia/Kolkata');

          if($this->getRequest()->getPost('s')!=null){

              $message=\Mage::getModel('Model\\Admin\\Message');

               $pro=$this->getModelObj();

                  if($id=$this->getRequest()->getGet('id')){

                         $pro->setData($this->getRequest()->getPost('customer')); 

                         $pro->updateddate=date('d-F-Y');

                         $primary=$pro->getPrimaryKey();

                         $pro->$primary=$id;     
 
                         if($pro->save())
                         {

                        $message->setSuccess('Update Successfully');
                         }
                        

              $this->redirect('edit',null,['id'=>$pro->customerId,'tab'=>'2'],true);  
            }
              else
              {

                $pro->setData($this->getRequest()->getPost('customer')); 

               $pro->createddate=date('d-F-Y');

               if($pro->save())
               {

                $message->setSuccess('Insert Successfully');
               }
                          $id=$pro->customerId;
                    $this->redirect("edit",null,['id'=>$id,'tab'=>'2'],true);
              }

            } 
          }  

     }catch (Exception $e) {

        $this->redirect('grid');
       
     }
  }

 public function deleteAction(){

  try {

   $id= (int) $this->getRequest()->getGet('id');
   $message=\Mage::getModel('Model\\Admin\\Message');
   if(!$id){
     
     $message->setFailer('Id needed');
     throw new Exception();
    
   }

    $pre=\Mage::getModel("Model\Customer") ;

    if($pre->delete($id))
    {
    $message->setSuccess('Delete Successfully');
    }
    
    $this->redirect('grid');


   } catch (Exception $e) {

     
     $this->redirect('grid');
    
  }

 }
   public function filterAction()
   {    
       $filter=\Mage::getModel('Model\Core\Filter'); 
         
        $filter->setFilter($this->getRequest()->getPost('filter'));
      
      $this->redirect('grid');

   }

 }

?>