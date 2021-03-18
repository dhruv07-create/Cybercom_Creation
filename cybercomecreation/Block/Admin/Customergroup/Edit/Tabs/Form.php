<?php
namespace Block\Admin\Customergroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Form extends \Block\Core\Table
{

	 private $modelObj=null;
	 public function __construct()
	 {
	 	$this->setTemplate('./View/admin/customergroup/edit/tabs/form.php');
	 }

	 public function setCatogoryGroup(\Model\Customergroup $modelObj=null)
	 {
	 	   if(!$modelObj)
	 	   {
	 	   		$modelObj=\Mage::getModel('Model\\Customergroup');
	 	   		 if($id=$this->getRequest()->getGet('id'))
	 	   		 {
 						$modelObj->load($id);
	 	   		 }
	 	   }

	 	 $this->modelObj=$modelObj; 
	 	 return $this; 
	 }

	 public function getCatogoryGroup()
	 {
	 	if(!$this->modelObj)
	 	{
	 		$this->setCatogoryGroup($this->getTableRow());
	 	}

	   return $this->modelObj;
	 }
}
?>