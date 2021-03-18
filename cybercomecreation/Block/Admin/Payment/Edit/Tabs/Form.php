<?php
namespace Block\Admin\Payment\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Form extends \Block\Core\Table
{

	 private $modelObj=null;
	 public function __construct()
	 {
	 	$this->setTemplate('./View/admin/payment/edit/tabs/form.php');
	 }

	 public function setPayment(\Model\Payment $modelObj=null)
	 {
	 	   if(!$modelObj)
	 	   {
	 	   		$modelObj=\Mage::getModel('Model\\Payment');
	 	   		 if($id=$this->getRequest()->getGet('id'))
	 	   		 {
 						$modelObj->load($id);
	 	   		 }
	 	   }

	 	 
	 	 $this->modelObj=$modelObj; 
	 	 return $this; 
	 }

	 public function getPayment()
	 {
	 	if(!$this->modelObj)
	 	{
	 		$this->setPayment($this->getTableRow());
	 	}

	   return $this->modelObj;
	 }
}
?>