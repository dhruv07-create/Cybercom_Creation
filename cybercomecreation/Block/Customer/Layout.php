<?php
namespace Block\Customer;
\Mage::loadFileByClassName('Block\\Core\\Layout');

class Layout extends \Block\Core\Layout 
{
    public function __construct()
    {    
    	 parent::__construct();
         $this->setTemplate("./View/customer/layout.php");
    }

    public function prepareChilds()
    {
    	 $this->addChild(\Mage::getBlock('Block\\Customer\\Layout\\Footer'),'footer');
         $this->addChild(\Mage::getBlock('Block\\Customer\\Layout\\Header'),'header');
         $this->addChild(\Mage::getBlock('Block\\Customer\\Layout\\Content'),'content');         
         $this->addChild(\Mage::getBlock('Block\\Customer\\Layout\\Right'),'right');
         $this->addChild(\Mage::getBlock('Block\\Customer\\Layout\\Left'),'left');
    }

}

?>