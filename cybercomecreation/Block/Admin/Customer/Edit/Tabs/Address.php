<?php
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\\Core\\Table');

class Address extends \Block\Core\Table					
{		
  private   $shipping=null;
  private   $billing=null;

   public function __construct()
	{
		$this->setTemplate('./View/admin/customer/edit/tabs/address.php');	
	}

	public function setShipping()
	{
		  $id=$this->getTableRow()->customerId;
		 $model=\Mage::getModel('Model\\Customer')->setPrimaryKey('id')->setTableName('customer_address');
	
		 $model->fetchRow("select * from customer_address where customerId={$id} AND addresstype='shipping';");

		  $this->shipping=$model;

		  return $this;
	}

	public function getShipping()
	{
		if(!$this->shipping)
		{
			$this->setShipping();
		}
	    return $this->shipping;	
	}

	public function setBilling()
	{
		  $id=$this->getTableRow()->customerId;
		 $model=\Mage::getModel('Model\\Customer')->setPrimaryKey('id')->setTableName('customer_address');
	
		 $model->fetchRow("select * from customer_address where customerId={$id} AND addresstype='billing';");

		  $this->billing=$model;

		  return $this;
	}

	public function getBilling()
	{
		if(!$this->billing)
		{
			$this->setBilling();
		}
	    return $this->billing;	
	}
}

?>