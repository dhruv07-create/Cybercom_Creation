<?php
namespace Controller; 

\Mage::loadFileByClassName('Controller\\Core\\Customer');

  class Home extends Core\Customer
  {
  	 public function viewAction(){
     
      $layout=$this->getLayout();
      $content=$layout->getContent();
      $content->addChild(\Mage::getBlock('Block\Customer\Home\home'));
      echo $layout->toHtml();    
  }
  }
?>