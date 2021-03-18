<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\\Core\\Admin');

class  Attribute extends \Controller\Core\Admin
{
	 public function gridAction()
	 {
	 	$layout=$this->getLayout();

	 	$layout->setTemplate('./View/core/layout/one_column.php');

	 	$layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Attribute\\grid'),'content');
	    $this->renderLayout();
	 }

	 public function formAction()
	 {
	 	 $table=\Mage::getModel('Model\\Attribute');
	 	 $layout=$this->getLayout();
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Attribute\\edit')->setTableRow($table),'edit');
	 	 $this->renderLayout();
	 }

	 public function editAction()
	 {
	 	 $table=\Mage::getModel('Model\\Attribute');
	 	 $table->load($this->getRequest()->getGet('id'));
	 	 $layout=$this->getLayout();
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Attribute\\Edit')->setTableRow($table),'edit');
	 	 $this->renderLayout();
	 }

	 public function saveAction()
	 {
     	 try {

     	 	 if($this->getRequest()->isPost())
     	 	 {
                $attribute=\Mage::getModel('Model\\Attribute');

     	 	 	if($id=$this->getRequest()->getGet('id'))
     	 	 	{
                   $attribute->load($id);

                   if(!$attribute)
                   {
                   	  throw new Exception("Error");
                   	  
                   } 
     	 	 	}

				$attribute->setData($this->getRequest()->getPost('attribute')); 
				if($attribute->save())
				{
					$message=\Mage::getModel('Model\\Admin\\Message');
					$message->setSuccess('insert update successfully');
	                if(!$id)
	                {	
					$query="ALTER TABLE {$attribute->entityTypeId} ADD {$attribute->code} {$attribute->backendType}; ";
					$attribute->getAdapter()->getConnection()->query($query);
				    }else{
				    	echo 'modify';
					$query="ALTER TABLE {$attribute->entityTypeId} MODIFY {$attribute->code} {$attribute->backendType}; ";
					$attribute->getAdapter()->getConnection()->query($query);				    	
				    }
				}  

				$this->redirect('grid',null,null,true);  	 	  	
     	 	 }

     	 } catch (\Exception $e) {
     	 	echo $e->getMessage();
     	 }
	 }

	 public function deleteAction()
	 {
	 	try
	 	{
          if($id=$this->getRequest()->getGet('id'))
          {
          	  $attribute=\Mage::getModel('Model\\Attribute');
          	  $attribute->load($id);
              $sql="ALTER TABLE {$attribute->entityTypeId} DROP COLUMN {$attribute->code};";
          	  if($attribute->delete())
          	  {  
                 $attribute->getAdapter()->getConnection()->query($sql);
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
}

?>