<?php
namespace Block\Admin\Admin;
 \Mage::loadFileByClassName('Block\\Core\\Edit');

 class Edit extends \BLock\Core\Edit {
  
  protected $adminObj='';
  private $tabelRow='';

  public function __construct()
  { 
     parent::__construct();
     $this->setTabClass('Block\\Admin\\Admin\\Edit\\Tab');
  }

 }

?>