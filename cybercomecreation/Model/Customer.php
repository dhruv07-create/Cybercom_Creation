<?php
namespace Model;
\Mage::loadFileByClassName('Model\\Core\\Adapter');
\Mage::loadFileByClassName('Model\\Core\\Table');


class Customer extends Core\Table{

    const STATUS_AVAILABLE=1;
    const STATUS_NOT_AVAILABLE=2;
    protected $billing=null;
    protected $shipping=null;

    public function __construct()
    {

          $this->setPrimaryKey("customerId");
          $this->setTableName("customer");

    }

  public function getStatusOption()
  {
   
     return [
         self::STATUS_AVAILABLE=>'Available',
         self::STATUS_NOT_AVAILABLE=>'Not-Available',
     ];

  }

 public function getBillingAddress()
 {
   if(!$this->customerId)
     {
       return false;
     } 
   
     $customerAddress=\Mage::getModel('Model\Customer\Address');
     $q="SELECT * FROM {$customerAddress->getTableName()} WHERE customerId={$this->customerId} AND addresstype='billing'";
     $billingAddress = $customerAddress->fetchRow($q);
     if(!$billingAddress)
     {
        return \Mage::getModel('Model\Customer\Address');
     }
     return $billingAddress;  
 }

 public function getShippingAddress()
 {
     if(!$this->customerId)
     {
       return false;
     } 
   
     $customerAddress=\Mage::getModel('Model\Customer\Address');
     $q="SELECT * FROM {$customerAddress->getTableName()} WHERE customerId={$this->customerId} AND addresstype='shipping'";
     $shippingAddress = $customerAddress->fetchRow($q);
     if(!$shippingAddress)
     {
        return false;
     }
     return $shippingAddress;
 }

}

?>