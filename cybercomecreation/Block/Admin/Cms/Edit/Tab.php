<?php
namespace Block\Admin\Cms\Edit;
\Mage::loadFileByClassName('Block\\Core\\Edit\\Tabs');

  
class Tab extends \Block\Core\Edit\Tabs
{
	
	 public function prepareTabs()
	 {
	 	parent::prepareTabs();

	    $this->addTab('1',['lable'=>'Cms','block'=>'Block\\Admin\\Cms\\Edit\\Tabs\\Edit']);

	    $this->setDefaultTab('1');
	 }
}


?>