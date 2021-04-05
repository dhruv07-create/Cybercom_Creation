<?php
namespace Block\Admin\Cart;

\Mage::loadFileByClassName("Block\Core\Table");

  class Shipping extends \Block\Core\Table
  {
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/cart/shipping.php');
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

     public function getShippingMethods()
       {
          $model = \Mage::getModel('Model\Shipping');
          $q="SELECT * FROM {$model->getTableName()} WHERE status=1";
          return $model->fetchAll($q);
       }  

  }

?>