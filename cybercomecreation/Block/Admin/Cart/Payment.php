<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName("Block\Core\Table");

  class Payment extends \Block\Core\Table
  {
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/cart/payment.php');
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

    public function getPaymentMethods()
     {   
         $payment = \Mage::getModel('Model\payment');
         $w="SELECT * FROM `{$payment->getTableName()}` where status=1";
         return $payment->fetchAll($w);     
     }    

  }

?>