<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName("Block\Core\Table");

  class Customer extends \Block\Core\Table
  {
    protected $cart=null;
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/cart/customer.php');
  	}

  	public function getCustomer()
  	{
  		$q="SELECT customerId,email FROM customer";
  		$pairs=\Mage::getModel('Model\Customer')->getAdapter()->fetchPairs($q);
  		return $pairs;
  	}

   public function setCart(\Model\Cart $cart)
    {
       $this->cart=$cart;
       return $this;
    }

    public function getCart()
    {
       return $this->cart;
    }    

  }

?>