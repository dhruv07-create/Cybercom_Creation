<?php
namespace Model\Cart;

class Address extends \Model\Core\Table
{

	const ADDRESS_TYPE_BILLING = "billing";
	const ADDRESS_TYPE_SHIPPING = "shipping";
	protected $cart=null;
	protected $customerBillingAddress=null;
	protected $customerShippingAddress=null;
  protected $shipping=null;
  protected $payment=null;
 	public function __construct()
	{
		$this->setTableName('cartaddress');
		$this->setPrimaryKey('cartAddressId');
	}


    public function setCart(\Model\Cart $cart)
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
    
     $cart=\Mage::getModel('Model\Cart')->load($this->cartId);
     $this->setCart($cart);
     return $this->cart;
   }  

    public function setBillingAddress(\Model\Customer\Address $billingAddress)
     {
           $this->customerBillingAddress=$billingAddress;
           return $this;   
     }  

     public function getBillingAddress()
     {
	 	 if(!$this->addressId)
	 	 {
	 	 	return false;
	 	 }
        $query="SELECT * FROM customer_address WHERE cartId={$this->cartId} AND addresstype={$this->addressType};";
        $address=\Mage::getModel('Model\Customer\Address')->fetchRow($query);
        $this->setCustomerBillingAddress($address);
        return $this;
     }
    
    public function setShippingAddress(\Model\Customer\Address $billingAddress)
     {
           $this->customerShippingAddress=$billingAddress;
           return $this;   
     }  

     public function getShippingAddress()
     {
     if(!$this->addressId)
     {
      return false;
     }
        $query="SELECT * FROM customer_address WHERE cartId={$this->cartId} AND addresstype={$this->addressType};";
        $address=\Mage::getModel('Model\Customer\Address')->fetchRow($query);
        $this->setCustomerShippingAddress($address);
        return $this;
     }

     public function setPaymentMethod(\Model\Payment $payment )
     {
         $this->payment=$payment;
         return $this;
     }
      
     public function getPaymentMethod()
     {
     
     if(!$this->paymentMethodId)
     {
      return false;
     }
        $payment=\Mage::getModel('Model\payment')->load($this->paymentMethodId); 
        $this->setPaymentMethod($payment);  
        return $this->payment;
     }

   public function setShippingMethod(\Model\Payment $shipping )
     {
         $this->shipping=$shipping;
         return $this;
     }
      
     public function getShippingMethod()
     {
      
     if(!$this->shippingMethodId)
     {
      return false;
     }
        $shipping=\Mage::getModel('Model\shipping')->load($this->shippingMethodId); 
        $this->setshippingMethod($shipping);
        return $this->shipping;

     }
     
}

?>