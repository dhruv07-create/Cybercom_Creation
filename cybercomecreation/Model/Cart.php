<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Cart extends Core\Table
{
	protected $customer = null;
	protected $items = null;
	protected $billingAddress = null;
	protected $shippingAddress = null;
	protected $paymentMethod=null;
	protected $shippingMethod=null; 
	public function __construct()
	{
		$this->setTableName('cart');
		$this->setPrimaryKey('cartId');
	}

	public function setCustomer(\Model\Customer $customer)
	{
         $this->customer=$customer;
         return $this;
	}

	public function getCustomer()
	{
		if($this->customer)
		{
			return $this->customer;
		} 

		if(!$this->customerId)
		{
			return false;
		}
		
		$customer = \Mage::getModel('Model\Customer')->load($this->customerId);
		$this->setCustomer($customer);	         
		return $this->customer;
	}

    public function setItems(\Model\Cart\Item\Collection $items)
    {
      	$this->items=$items;
      	return $this;	
    }

	public function getItems()
	{
		

		if(!$this->cartId)
		{
			return false;
		}
		
		$query = "SELECT * FROM cartItem WHERE cartId='{$this->cartId}'";
		$items = \Mage::getModel('Model\Cart\Item')->fetchAll($query);	
        $this->setItems($items); 
		return $items;
	}

	public function setPaymentMethod(\Model\payment $payment)
	{
		$this->paymentMethod = $payment;
		return $this;
	}

	public function getPaymentMethod()
	{
		if($this->paymentMethod)
		{
			return $this->paymentMethod;
		}

		if(!$this->paymentMethodId)
		{
			return false;
		}

		$payment = \Mage::getModel('Model\payment')->load($this->getPaymentMethodId);
        $this->setPaymentMethod($paymentMethod);
        return $this->paymentMethod;

	}

	public function setShippingMethod(\Model\shipping $shipping)
	{
		$this->shippingMethod = $shipping;
		return $this;
	}

	public function getShippingMethod()
	{
		if($this->shippingMethod)
		{
			return $this->shippingMethod;
		}

		if(!$this->shippingMethodId)
		{
			return false;
		}

		$shipping = \Mage::getModel('Model\shipping')->load($this->shippingMethodId);
        $this->setShippingMethod($shipping);
        return $this->shippingMethod;

	}

    public function setBillingAddress(\Model\Cart\Address $address)
    {   
          $this->billingAddress=$address;
          return $this;  
    }

	public function getBillingAddress()
	{
		if(!$this->cartId)
		{
			return false;
		}

       $query="SELECT * FROM cartaddress WHERE cartId='{$this->cartId}' AND addressType='billing'";
	   $billlingAddress=\Mage::getModel("Model\Cart\Address")->fetchRow($query);
	   if(!$billlingAddress)
	   {
	    return false;
	   }
	   $this->setBillingAddress($billlingAddress);
	   return $this->billingAddress;

	}

	public function setShippingAddress(\Model\Cart\Address $address)
    {   
          $this->shippingAddress=$address;
          return $this;  
    }

	public function getShippingAddress()
	{
		if(!$this->cartId)
		{
			return false;
		}

       $query="SELECT * FROM cartaddress WHERE cartId='{$this->cartId}' AND addressType='shipping'";
	   $shippingAddress=\Mage::getModel("Model\Cart\Address")->fetchRow($query);
	   if(!$shippingAddress)
	   {
	    return false;
	   }
	   $this->setShippingAddress($shippingAddress);
	   return $this->shippingAddress;

	}

	public function addItemToCart(\Model\product $product,$quentity=1,$forAdd=false)
	{
       $query="SELECT * FROM cartitem WHERE productId={$product->productId} AND cartId=$this->cartId;";

       $cartItem=\Mage::getModel('Model\cart\item')->fetchRow($query);

       if($cartItem)
       {
           $cartItem->quentity +=$quentity;
           $cartItem->discount=($cartItem->quentity)*$product->discount;
           $cartItem->price=($product->price)*$cartItem->quentity; 
           $cartItem->save();
           return true;
       }

       $cartItem=\Mage::getModel('Model\cart\item');
       $cartItem->cartId=$this->cartId;
       $cartItem->productId=$product->productId;
       $cartItem->createdDate=date('Y-m-d H:i:s');
       $cartItem->quentity=$quentity; 
       $cartItem->basePrice=$product->price;
       $cartItem->price=($product->price)*$quentity; 
       $cartItem->discount=($cartItem->quentity)*$product->discount;
       $cartItem->save();
       return true;    
	}
}

?>