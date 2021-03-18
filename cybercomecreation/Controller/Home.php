<?php
namespace Controller; 

\Mage::loadFileByClassName('Controller\\Core\\Customer');

  class Home extends Core\Customer
  {
  	 public function gridAction(){

       try {

            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Shipping\\Grid'),'grid');
             $this->renderLayout();
        
           } catch (Exception $e) {
        
            echo $e->getMessage();
       }
  }
  }


?>