<?php
namespace Controller\Admin;
  ob_start();

  \Mage::loadFileByClassName("Controller\\Core\\Admin");
 

 class Customergroup extends \Controller\Core\Admin{

  private $customers=[];
  private $model_customer=null;

  public function gridAction(){

     try{

           $layout=$this->getLayout();
           $layout->setTemplate('./View/core/layout/one_column.php');
           $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Customergroup\\Grid'),'grid');
          echo $layout->toHtml();
      
   
      }catch (Exception $e){
       
       echo $e->getMessage();

   }
   
  }
  public function setModelObj($obj =null ){
 
     if(!$obj){
 
      $obj = \Mage::getModel('Model\\Customergroup');

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
           $model=\Mage::getModel('Model\\Customergroup');
           $layout=$this->getLayout();
           $layout->getChild('content')->addChild(\Mage::getModel('Block\\Admin\\Customergroup\\Edit')->setTableRow($model),'edit');
          echo $layout->toHtml();

    }catch(Exception $e)
    {
        echo $e->getMessage();
    }

  }
   


  public function editAction(){

     try {
            $id=$this->getRequest()->getGet('id');
            $model=\Mage::getModel('Model\\Customergroup');
            $model->load($id);
           $layout=$this->getLayout();
           $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Customergroup\\Edit')->setTableRow($model),'edit');
          echo $layout->toHtml();
     }catch (Exception $e) {

        $this->redirect('grid');
       
     }   

  }

  public function saveAction()
  {
    try {

         date_default_timezone_set('Asia/Kolkata');

          if($this->getRequest()->isPost())
          {

          if($this->getRequest()->getPost('s')!=null){

              $message=\Mage::getModel('Model\\Admin\\Message');

               $pro=$this->getModelObj();

                  if($id=$this->getRequest()->getGet('id')){

                         $pro->setData($this->getRequest()->getPost('group')); 

                         $primary=$pro->getPrimaryKey();

                         $pro->$primary=$id;     
 
                         if($pro->save())
                         {

                        $message->setSuccess('Update Successfully');
                         }
                        

              $this->redirect('grid');  
            }
              else
              {

                $pro->setData($this->getRequest()->getPost('group')); 

               $pro->createddate=date('d-F-Y');

               if($pro->save())
               {

                $message->setSuccess('Insert Successfully');
               }

                    $this->redirect("grid");

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

    $pre= \Mage::getModel('Model\\Customergroup');

    if($pre->delete($id))
    {
    $message->setSuccess('Delete Successfully');
    }
    
    $this->redirect('grid');


   } catch (Exception $e) {

     
     $this->redirect('grid');
    
  }

 }

 }

?>