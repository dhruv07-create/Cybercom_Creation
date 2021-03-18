<?php
namespace Block\Admin\Dashbord;
  \Mage::loadFileByClassName('Block\\Core\\Table');

 class Home extends \Block\Core\Table {
   
      public function __construct(){

      	 $this->setTemplate('View/admin/dashbord/home.php');
      }

 }


?>