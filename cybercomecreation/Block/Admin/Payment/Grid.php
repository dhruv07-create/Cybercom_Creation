<?php  
namespace Block\Admin\Payment;
  \Mage::loadFileByClassName('Block\\Core\\Table');

  class Grid extends \Block\Core\Table {

     protected $payment=[];

     protected $collection='';

     public function __construct()
     {
        $this->setTemplate('./View/admin/payment/grid.php');
     }

     public function setPayments($collection =null )
     {
          if(!$collection)
          {
          	$collection=\Mage::getModel('Model\\Payment')->fetchAll();
          }

       $this->collection=$collection;

       return $this;

     }

     public function getPayments()
     {

         if(!$this->collection)
         {
            $this->setPayments();
         }

         return $this->collection;
     }


  }


?>