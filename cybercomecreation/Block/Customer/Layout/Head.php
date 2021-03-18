<?php
namespace Block\Customer\Layout;

\Mage::loadFileByClassName('Block\\Core\\Table');
 
  class Head extends \Block\Core\Table
  {
  	 public function __construct()
  	 {
  	 	$this->setTemplate('./View/customer/layout/head.php');
  	 }
  }


?>