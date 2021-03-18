<?php
namespace Block\Admin\Category;   
 \Mage::loadFileByClassName('Block\\Core\\Edit');

 class Edit extends \BLock\Core\Edit {

 	protected $categoryObj=null;


  public function __construct()
  {    
      parent::__construct();
      $this->setTabClass('Block\\Admin\\Category\\Edit\\Tab');
  }

 }


?>