<?php
namespace Block\Admin\Shipping\Edit; 

\Mage::loadFileByClassName("Block\\Core\\Edit\\Tabs");
class Tab extends \Block\Core\Edit\Tabs
{
	public function prepareTabs()
	{   
		parent::prepareTabs();
		$this->addTab('1',['lable'=>'ShippingInfo','block'=>'Block\\Admin\\Shipping\\Edit\\Tabs\\Form']);
		$this->addTab('2',['lable'=>'Other','block'=>'Block\\Admin\\Shipping\\Edit\\Tabs\\Other']);
		$this->setDefaultTab('1');
	}
	
}		