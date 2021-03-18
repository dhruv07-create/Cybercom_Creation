<?php
    namespace Block\Admin\Customer\Edit; 
\Mage::loadFileByClassName('Block\\Core\\Edit\\Tabs');

class Tab extends \Block\Core\Edit\Tabs{

	public function prepareTabs()
	{   
		parent::prepareTabs();
		$this->addTab('1',['lable'=>'CustomerInfo.','block'=>'Block\\Admin\\Customer\\Edit\\Tabs\\Form']);
		$this->addTab('2',['lable'=>'Address.','block'=>'Block\\Admin\\Customer\\Edit\\Tabs\\Address']);
		$this->setDefaultTab('1');
	}
}

?>