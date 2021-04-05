<?php
namespace Controller\Admin;

class Cart extends \Controller\Core\Admin
{
	 public function addToCartAction()
	 {
	 	try {
	 	   
	 	   $productId=$this->getRequest()->getGet('productId');
	 	   $product=\Mage::getModel('Model\product')->load($productId);
	 	   $cart=$this->getCart();
	 	   $cart->addItemToCart($product,1,true); 
	 	   $this->redirect('grid','admin\cart',null,true);
		 
	 	} catch (\Exception $e) {
	 		echo $e->getMessage();
	 	}
	 }

	 public function getCart()
	 {   
	 	 $adminSession=\Mage::getModel('Model\Admin\Session');
	 	 $id=$adminSession->customerId;
         $model=\Mage::getModel('Model\Cart');
	 	 if($id)
	 	 {
         $q="SELECT * FROM cart WHERE customerId={$id};";	
         if(!$model->fetchRow($q))
         {   
         	$model->customerId=$id;
         	$model->save(); 
         	return $model;
         }
        }
        return $model;
	 }

	 public function gridAction()
	 {
         $session=\Mage::getModel('Model\Admin\Session');
	 	 $layout=$this->getLayout();
	 	 $layout->getContent()->addChild(\Mage::getBlock('Block\Admin\Cart\View')->setCart($this->getCart()),'view');
	 	 echo $layout->toHtml();
	 }

	 public function updateDetailsAction()
	 {
	 	 $session=\Mage::getModel('Model\Admin\Session');
	 	 $id=$this->getRequest()->getPost('cart')['customer'];
	 	 if(!$id)
	 	 {
	 	     unset($session->customerId);
	 	 }
         $session->customerId=$id;
         var_dump($session->customerId);
	 	 $this->redirect('grid','admin\cart',true);
	 }

	 public function updateQuentityAction()
	 {
        $quentitys=$this->getRequest()->getPost('cart')['quentity'];
        foreach ($quentitys as $itemId => $quentity) 
        {  
        	$item=\Mage::getModel('Model\Cart\item')->load($itemId);
        	$item->quentity=$quentity;
        	$item->price=$item->quentity*$item->basePrice;
            $item->discount=($item->getProduct()->discount)*$item->quentity;  
            $item->save();
        }
          $this->redirect('grid',null,null,true);
	 }

	 public function deleteAction()
	 {
	 	 $id=$this->getRequest()->getGet('id');

	 	 $item=\Mage::getModel('Model\cart\item')->load($id);
	 	 $item->delete();
	 	 $this->redirect('grid');
	 }

	 public function updateShippingAddressAction()
	 {  
	 	   $shippingData=$this->getRequest()->getPost('cart')['shipping'];	
	 	   $shipping=$this->getCart()->getShippingAddress();
	 	  if(!$shipping)
	 	  {  $shipping=\Mage::getModel('Model\Cart\Address');
             $shipping->cartId=$this->getCart()->cartId;
             $shipping->addressType='shipping';
	 	  }

	 	 $shipping->setData($shippingData); 
	 	 $shipping->save();

        if($this->getRequest()->getPost('cart')['addressbook1'])
        { 
         $customer=$this->getCart()->getCustomer()->getShippingAddress();
         if(!$customer)
         {
         	$customer->customerId=$this->getCart()->getCustomer()->customerId;
         	$customer->addresstype='shipping';

         } 

            $customer->address=$shipping->address;
         	$customer->firstname=$shipping->firstname;
         	$customer->state=$shipping->state;
         	$customer->country=$shipping->country;
         	$customer->zipcode=$shipping->zipcode;
         	$customer->city=$shipping->city;
         	$customer->save(); 
         }
	 	 $this->redirect('grid');
	 	  
	 }

	 public function updateBillingAddressAction()
	 {

	 	$billing=$this->getCart()->getBillingAddress();
   	 	$billingData=$this->getRequest()->getPost('cart')['billing'];	
	 	$sameAsShipping=$billingData['sameasshipping'];
	 	  if(!$billing)
	 	  {  $billing = \Mage::getModel('Model\Cart\Address');
             $billing->cartId=$this->getCart()->cartId;
             $billing->addressType='billing';
	 	  }
	 	  if($sameAsShipping)
	 	  {
	 	  	$shipping=$this->getCart()->getShippingAddress();
            $billing->address=$shipping->address;
         	$billing->firstname=$shipping->firstname;
         	$billing->state=$shipping->state;
         	$billing->country=$shipping->country;
         	$billing->zipcode=$shipping->zipcode;
         	$billing->city=$shipping->city;
         	$billing->sameasshipping=1;
	 	  }else
	 	  {
	 	   $billing->setData($billingData);
	 	   $billing->sameasshipping=2;
	 	  }
	 	 $billing->save();

	   if($this->getRequest()->getPost('cart')['addressbook2'])
        { 
         $customer=$this->getCart()->getCustomer()->getBillingAddress();
         if(!$customer->customerId)
         {
         	$customer->customerId=$this->getCart()->getCustomer()->customerId;
         	$customer->addresstype='billing';

         } 

         if($sameAsShipping)
         {
            $billing=$shipping;
         } 

            $customer->address=$billing->address;
         	$customer->firstname=$billing->firstname;
         	$customer->state=$billing->state;
         	$customer->country=$billing->country;
         	$customer->zipcode=$billing->zipcode;
         	$customer->city=$billing->city;
         	$customer->save(); 
         } 	 
	 	 $this->redirect('grid');
	 }

	 public function updatePaymentMethodAction()
	 {
          $methodId = $this->getRequest()->getPost('cart')['paymentMethod'];
          $cart = $this->getCart();
          if($cart)
          {
	          if($methodId)
	          {
	             $cart->paymentMethodId=$methodId;
	          }
	          $cart->save();
          }
          $this->redirect('grid');
	 }

	 public function updateShippingMethodAction()
	 {
	 	$methodId = $this->getRequest()->getPost('cart')['shippingMethod'];
	 	$cart = $this->getCart();

	 	if($cart)
	 	{
	 		if($methodId)
	 		{
	 		  $cart->shippingMethodId=$methodId;
	 		}
	 		$cart->save();
	 	}
	   $this->redirect('grid'); 	
	 }
}


?>