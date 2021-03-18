<?php
namespace Block\Admin\Category\Edit;
\Mage::loadFileByClassName('Block\\Core\\Edit\\Tabs');

class Tab extends \Block\Core\Edit\Tabs
{

	public function prepareTabs()
	{
		parent::prepareTabs();         
		$this->addTab('1',['lable'=>'CategoryInfo','block'=>'Block\\Admin\Category\\Edit\\Tabs\\Form']);
		$this->addTab('2',['lable'=>'Images','block'=>'Block\\Admin\\Category\\Edit\\Tabs\\Image']);
		$this->setDefaultTab('1');
	}
}

?>