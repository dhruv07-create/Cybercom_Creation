<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\\Core\\Edit');

 class Edit extends \Block\Core\Edit {


      
 	   public function __construct(){
           parent::__construct();
        	$this->setTabClass('Block\\Admin\\Customer\\Edit\\Tab');
        }
 }

?>