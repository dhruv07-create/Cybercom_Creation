<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName("Block\Core\Table");

  class View extends \Block\Core\Table
  {
    protected $cart=null;
    protected $items=null;
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/cart/view.php');
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