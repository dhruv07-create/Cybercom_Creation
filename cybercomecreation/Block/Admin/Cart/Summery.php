<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName("Block\Core\Table");

  class Summery extends \Block\Core\Table
  {
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/cart/summery.php');
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