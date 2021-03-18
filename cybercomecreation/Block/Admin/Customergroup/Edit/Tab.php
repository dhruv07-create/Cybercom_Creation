<?php
namespace  Block\Admin\Customergroup\Edit;
\Mage::loadFileByClassName('Block\\Core\\Edit\\tabs');

class Tab extends \Block\Core\Edit\tabs
{
	 public function prepareTabs()
	 {
            parent::prepareTabs();
	 		$this->addTab('1',['lable'=>'GroupInfo','block'=>'Block\\Admin\\Customergroup\\Edit\\Tabs\\Form']);
	 		$this->setDefaultTab('1');
	 }
}

?>