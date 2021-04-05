<?php
namespace Model\Cart;

class Item extends \Model\Core\Table
{
	protected $cart = null;
	protected $product = null;
	public function __construct()
	{
		$this->setTableName('cartitem');
		$this->setPrimaryKey('cartItemId');
	}
// getCart , setCart
// get Product , setProduct	

   public function setCart(\Model\Cart $cat )
   {
   	  $this->cart=$cart;
   	  return $this;
   }

   public function getCart()
   {
   	  if(!$this->cartId)
   	  {
   	  	return false;
   	  }
    
     $cart=\Mage::getModel('Model\cart')->load($this->cartId);
     $this->setcart($cart);
     return $this->cart;
   }

   public function setProduct(\Model\Product $product)
   {
   	   $this->product=$product;
   	   return $this;
   }

   public function getProduct()
   {
        if($this->product)
        {
           return $this->product;
        }
   	  if(!$this->productId)
   	  {
   	  	return false;
   	  }

   	  $product=\Mage::getModel('Model\Product')->load($this->productId);
   	  $this->setProduct($product);
   	  return $this->product;
   }

}

?>