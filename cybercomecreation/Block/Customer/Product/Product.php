<?php
namespace Block\Customer\Product;

class Product extends \Block\Core\Table
{
	protected $product=null;
   public function __construct()
   	{
   		$this->setTemplate('./View/Customer/product/product.php');
   	}	

   	public function setProduct(\Model\Product $Product)
   	{
   		 $this->product=$Product;
   		 return $this;
   	}

   	public function getProduct()
   	{
   		 return $this->product;
   	}
}

?>