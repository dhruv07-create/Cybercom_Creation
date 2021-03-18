<?php
namespace Block\Admin\Product\Edit;
\Mage::loadFileByClassName('Block\\Core\\Edit\\Tabs');

class Tab extends \Block\Core\Edit\Tabs
{

 	public function prepareTabs()
 	{
 		parent::prepareTabs();
 		$this->addTab('1',['lable'=>'ProductInfo','block'=>'Block\\Admin\\Product\\Edit\\Tabs\\Form']);
 		$this->addTab('2',['lable'=>'Media','block'=>'Block\\Admin\\Product\\Edit\\Tabs\\Media']);
 		$this->addTab('3',['lable'=>'GroupPrice','block'=>'Block\\Admin\\Product\\Edit\\Tabs\\GroupPrice']);
 		$this->addTab('4',['lable'=>'Attribute','block'=>'Block\\Admin\\Product\\Edit\\Tabs\\Attribute']);
 		$this->setDefaultTab('1');
 	}

}

?>