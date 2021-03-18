<?php
namespace Block\Admin;
\Mage::loadFileByClassName('Block\\Core\\Table');

 class Header extends \Block\Core\Table 
 {

    public function __construct()
    {
         
           $this->setTemplate('./View/admin/header.php');
    }

 }


?>