<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\\Core\\Admin');

class Cms extends \Controller\Core\Admin
{	
	 public function gridAction()
	 {
	 	 $layout=$this->getLayout();
	 	 $layout->setTemplate('./View/Core/layout/one_column.php');
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Cms\\Grid'),'content');
	 	echo $layout->toHtml();
	 }

	 public function formAction()
	 {
	 	 $rowData=\Mage::getModel('Model\\Cms');
	     $layout=$this->getLayout();
	 	 $layout->setTemplate('./View/Core/layout/one_column.php');
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Cms\\Edit')->setTableRow($rowData),'Content');
	 	echo $layout->toHtml();	
	 }

	 public function editAction()
	 {
	 	 $id=$this->getRequest()->getGet('id');
	 	 $rowData=\Mage::getModel('Model\\Cms');
	 	 $rowData->load($id);
	     $layout=$this->getLayout();
	 	 $layout->setTemplate('./View/Core/layout/one_column.php');
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Cms\\Edit')->setTableRow($rowData),'Content');
	 	echo $layout->toHtml();	
	 }

	 public function saveAction()
	 {   
	  	
	 	 try {
	 	   $message=\Mage::getModel('Model\\Admin\\Message');	
	 	 	if($this->getRequest()->isPost())
	 	 	{
	 	 		$cms=\Mage::getModel('Model\\Cms');
	 	 		if($id=$this->getRequest()->getGet('id'))
	 	 		{
                   $cms->load($id);

                   if(!$cms)
                   {
                   	throw new Exception("Error Processing Request");
                   }
                  $cms->setData($this->getRequest()->getPost('cms')); 
	 	 		}
	 	 	else{

	 	 		$cms->createddate=date("d-F-y");
	 	 		$cms->setData($this->getRequest()->getPost('cms'));
	 	 	}

	 	   if($cms->save())
	 	   {
               $message->setSuccess('Insert/Update Success');
	 	   }

	 	  $this->redirect('grid'); 	
	 	 }	

	 	 } catch (\Exception $e) {
	 	 	 
	 	 	 echo $e->getMessage();
	 	 }
	 }


	 public function deleteAction()
	 {
	 	 try {
	 	 	 
	 	 	 if($id=$this->getRequest()->getGet('id'))
	 	 	 {
	 	   $message=\Mage::getModel('Model\\Admin\\Message');	

	 	 	 	$cms=\Mage::getModel('Model\\cms');

	 	 	 	$cms->load($id);

	 	 	 	if($cms->delete())
	 	 	 	{
                    $message->setSuccess('Successful Deleted');
	 	 	 	}
	 	 	 }

	 	   $this->redirect('grid'); 

	 	 } catch (\Exception $e) {
	 	 	echo $e->getMessage();
	 	 }
	 }
}

?>