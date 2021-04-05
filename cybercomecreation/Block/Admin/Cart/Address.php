<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName("Block\Core\Table");

  class Address extends \Block\Core\Table
  {
    protected $cart=null;
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/cart/address.php');
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

    public function getShippingAddress()
    {
       $address=$this->getCart()->getShippingAddress();
       if(!$address)
       {
         if($this->cart->cartId)
         {
         $address1=$this->getCart()->getCustomer()->getShippingAddress();
         return $address1; 
         }
            return \Mage::getModel('Model\Cart\address');
       } 
       return $address;
    } 
   
    public function getBillingAddress()
    {
       $address=$this->getCart()->getBillingAddress();

       if(!$address)
       {
        if($this->getCart()->cartId)
        {
         $address1=$this->getCart()->getCustomer()->getBillingAddress();
         if($address1)
         {
         return $address1; 
         } 
        }
         return \Mage::getModel('Model\cart\address');
       } 
       return $address;
    }

  
  }

?>