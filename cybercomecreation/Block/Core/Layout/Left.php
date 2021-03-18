<?php
namespace Block\Core\Layout; 
 
 \Mage::loadFileByClassName('Block\\Core\\Table');

  class Left extends \Block\Core\Table 
   {
         public function __construct()
         {
         	 $this->setTemplate('View/Core/layout/left.php');
         } 
   }


?>