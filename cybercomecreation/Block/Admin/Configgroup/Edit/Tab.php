<?php
namespace Block\Admin\Configgroup\Edit;

class Tab extends \Block\Core\Edit\Tabs
{

	public function prepareTabs()
	{
		parent::prepareTabs();         
		$this->addTab('1',['lable'=>'Information','block'=>'Block\\Admin\Configgroup\\Edit\\Tabs\\Edit']);
		$this->addTab('2',['lable'=>'Config','block'=>'Block\\Admin\\Configgroup\\Edit\\Tabs\\Config']);
		$this->setDefaultTab('1');
	}
}

?>