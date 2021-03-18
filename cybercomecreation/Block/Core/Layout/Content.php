<?php
namespace Block\Core\Layout; 
    \Mage::loadFileByClassName('Block\\Core\\Table');

      class Content  extends \Block\Core\Table { 

             public function __construct(){

                      $this->setTemplate('./View/core/layout/content.php');

 					
             }
      }  

  ?>