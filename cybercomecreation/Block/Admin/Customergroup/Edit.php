<?php
namespace Block\Admin\Customergroup;

\Mage::loadFileByClassName('Block\\Core\\Edit');

 class Edit extends \Block\Core\Edit {
  
      public function __construct()
     {
        parent::__construct();
        $this->setTabClass('Block\\Admin\\Customergroup\\Edit\\Tab');
     }


 }

?>