<?php   
namespace Controller\Admin;
   ob_start();

\Mage::loadFileByClassName('Controller\\Core\\Admin');


class Shipping extends \Controller\Core\Admin {

  private $objModel=null;

  public function gridAction(){

       try {

         $pager=\Mage::getController("Controller\\Core\\Pager");
         $pager->setCurrentPage($this->getRequest()->getGet('page'));
            $layout=$this->getLayout();
            $layout->setTemplate('./View/Core/layout/one_column.php');
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Shipping\\Grid')->setPager($pager),'grid');
           echo $layout->toHtml();
        
           } catch (Exception $e) {
        
            echo $e->getMessage();
       }

       	
  }

   public function setModelObj($model =null){

       if(!$model)
       {

        $model=\Mage::getModel('Model\\Shipping');

       }

       $this->objModel=$model;

    return $this;

  }

  public function getModelObj(){

          if($this->objModel)
          {
             $this->setModelObj();
          }
    
    return $this->objModel;

  }



  

  public function formAction(){
          
      try{   
            $row=\Mage::getModel('Model\\Shipping');
            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Shipping\\Edit')->setTableRow($row),'edit');
           echo $layout->toHtml();                                                       

        }catch(Exception $e)
        {
          $e->getMeassage();
        }
  }

  public function editAction(){

     try {
            $row=\Mage::getModel('Model\\Shipping');
          	$id= (int) $this->getRequest()->getGet('id');
           
             $row->load($id); 
            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Shipping\\Edit')->setTableRow($row),'edit');
            echo $layout->toHtml();

      } catch (Exception $e) {
      $this->redirect('grid');
     }

  }

  public function saveAction()
  {
      try {

        $id= (int) $this->getRequest()->getGet('id');

        if($this->getRequest()->isPost())
        {

        if($this->getRequest()->getPost('s')!=null)
        {

          $message=\Mage::getModel('Model\\Admin\\Message');       
          date_default_timezone_set('Asia/Kolkata');
  
           $pre=\Mage::getModel("Model\\Shipping");
           
              if($id)
              {

                $pre->setData($this->getRequest()->getPost('shipping'));

                $primary=$pre->getPrimaryKey();

                $pre->$primary=$id;

                 $pre->updateddate=date("d-F-Y");

                if($pre->save())
                {

              $message->setSuccess('Update Successfully');
                }
  
                $this->redirect('grid');
                   
              }else
              {
                  $pre->setData($this->getRequest()->getPost('shipping'));

                  $pre->createddate=date("d-F-Y");

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

       public function deleteAction(){

          try {

          	 $id=(int) $this->getRequest()->getGet('id');

          	 if(!$id){

          	 	throw new Exception("Error Request Id Missing");
          	 	
          	 }

              $pre=\Mage::getModel('Model\\Shipping');

            $message=\Mage::getModel('Model\\Admin\\Message');

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
      $Filter=\Mage::getModel('Model\Core\filter');

      $Filter->setFilter($this->getRequest()->getPost('filter'));

      $this->redirect('grid');
   }

}


?>