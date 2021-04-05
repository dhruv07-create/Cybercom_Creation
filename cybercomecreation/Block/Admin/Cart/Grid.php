<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName("Block\Core\Table");

  class Grid extends \Block\Core\Table
  {
    protected $items=null;
    protected $cart=null;
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/cart/grid.php');
  	}

    public function getItems()
    {
    	$customerId=\Mage::getModel('Model\Admin\Session')->customerId; 
        $cart=\Mage::getModel('Model\Cart')->fetchRow("SELECT * FROM cart WHERE customerId={$customerId};");
       
       if(@$cart->cartId)
       {
       return $cart->getItems();
       }
     return false;
   
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