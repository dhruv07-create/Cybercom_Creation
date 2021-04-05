<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\\Core\\Admin');

class  Configgroup extends \Controller\Core\Admin
{
	 public function gridAction()
	 {          
	    $pager=\Mage::getController('Controller\Core\Pager');
        $id=$this->getRequest()->getGet('page');
        $pager->setCurrentPage($id);
	 	$layout=$this->getLayout();
	 	$layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Configgroup\\grid')->setPager($pager),'content');
	    $this->renderLayout();
	 }

	 public function formAction()
	 {
	 	 $table=\Mage::getModel('Model\\configgroup');
	 	 $layout=$this->getLayout();
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\configgroup\\edit')->setTableRow($table),'edit');
	 	 $this->renderLayout();
	 }

	 public function editAction()
	 {
	 	 $table=\Mage::getModel('Model\\configgroup');
	 	 $table->load($this->getRequest()->getGet('id'));
	 	 $layout=$this->getLayout();
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Configgroup\\Edit')->setTableRow($table),'edit');
	 	 $this->renderLayout();
	 }

	  public function saveAction()
  {
      try
     {     
            if($this->getRequest()->isPost())
            {

            if($this->getRequest()->getPost('s')!=null)
            {
              date_default_timezone_set('Asia/Kolkata');

                $pro=\Mage::getModel('Model\configgroup');

                 if($id=$this->getRequest()->getGet('id'))
                 {
                     
                 $pro->load($id);     
                 $pro->setData($this->getRequest()->getPost('configgroup'));

             if($pro->save())
              {

             $session= new \Model\Admin\Message();
             $session->setSuccess('Update Successfully');
                
              }

               echo  'edit';
            
             
             $this->redirect('grid');

             /*   $pager=\Mage::getController('Controller\Core\Pager');
                $id=$this->getRequest()->getGet('page');
                $pager->setCurrentPage($id);
                  
                 $grid=\Mage::getModel('Block\\Admin\\Admin\\Grid')->setPager($pager)->toHtml();
                $responce=[
                   'message'=>'Successfully',
                   'element'=>[
                    'selectore'=>'#content',
                    'html'=>$grid
                  ]
                ];

                header('Content-Type:application/json');

                echo json_encode($responce);
*/
            }else
            {
             
               $pro->setData($this->getRequest()->getPost('configgroup'));
               $pro->createddate=date('Y-F-d');

               if($pro->save())
               {

               $session=\Mage::getModel('Model\\Admin\\Message');
               $session->setSuccess('Insert Successfully');
               }
              
              $this->redirect('grid');

            }

            } 
          }   

     } catch (Exception $e) 
     {

        $this->redirect('grid');

       
     }

  }
	 public function deleteAction()
	 {
	 	try
	 	{
          if($id=$this->getRequest()->getGet('id'))
          {
          	  $configgroup=\Mage::getModel('Model\\Configgroup');
          	  $configgroup->load($id);
          	  if($configgroup->delete())
          	  {  
				$message=\Mage::getModel('Model\\Admin\\Message');
				$message->setSuccess('Delete successfully');          	  	
          	  }

          }

          $this->redirect('grid');

	 	}catch(\Exception $e)
	 	{
	 		echo $e->getMessage();
	 	}
	 }

	public function filterAction()
   {    
       $filter=\Mage::getModel('Model\Core\Filter'); 
         
        $filter->setFilter($this->getRequest()->getPost('filter'));
          
          print_r($filter->getFilters());

      $this->redirect('grid');
   }
}

?>