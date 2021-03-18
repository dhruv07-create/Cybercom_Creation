<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\\Core\\Table');
\Mage::loadFileByClassName('Block\\Core\\Layout\\Content');
\Mage::loadFileByClassName('Block\\Core\\Layout\\Right');
\Mage::loadFileByClassName('Block\\Core\\Layout\\Left');

 class Layout extends Table {


    public function __construct()
    {

         $this->setTemplate("./View/Core/layout/one_column.php");

         $this->prepareChilds();
       
    }

    public function prepareChilds()
    {
         $this->addChild(\Mage::getBlock('Block\\Admin\\Footer'),'footer');
         $this->addChild(\Mage::getBlock('Block\\Admin\\Header'),'header');
         $this->addChild(\Mage::getBlock('Block\\Core\\Layout\\Content'),'content');         
         $this->addChild(\Mage::getBlock('Block\\Core\\Layout\\Right'),'right');
         $this->addChild(\Mage::getBlock('Block\\Core\\Layout\\Left'),'left');
    }

    public function getContent()
    {
    	return $this->getChild('content');
    }
      public function getHeader()
    {
    	return $this->getChild('header');
    }
      public function getFooter()
    {
    	return $this->getChild('footer');
    }
      public function getLeft()
    {
    	return $this->getChild('left');
    }

 }


?>