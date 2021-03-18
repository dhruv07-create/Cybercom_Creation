<?php
namespace Block\Admin\Product;
  \Mage::loadFileByClassName('Block\\Core\\Edit');

 class Edit extends \BLock\Core\Edit 
 {

      public function __construct()
     {
        parent::__construct();
        $this->setTabClass('Block\\Admin\\Product\\Edit\\Tab');
     }

 }

?>