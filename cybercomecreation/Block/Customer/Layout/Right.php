<?php
namespace Block\Customer\Layout; 
 
 \Mage::loadFileByClassName('Block\\Core\\Table');

  class Right extends \Block\Core\Table 
   {
         public function __construct()
         {
         	 $this->setTemplate('View/Customer/layout/right.php');
         } 
   }


?>