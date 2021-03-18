<?php
namespace Block\Admin;
 
\Mage::loadFileByClassName('Block\\Core\\Table');

 class Footer extends \Block\Core\Table 
 {

    public function __construct()
    {
         
           $this->setTemplate('./View/admin/footer.php');
    }

 }


?>