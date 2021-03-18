<?php
namespace Block\Admin\Payment\Edit;
\Mage::loadFileByClassName('Block\\Core\\Edit\\Tabs');

class Tab extends \Block\Core\Edit\Tabs
{
	 public function prepareTabs()
	 {      
	 	    parent::prepareTabs();
	 		$this->addTab('1',['lable'=>'PaymentInfo','block'=>'Block\\Admin\\Payment\\Edit\\Tabs\\Form']);
	 		$this->setDefaultTab('1');
	 }
}

?>