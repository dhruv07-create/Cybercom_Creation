<?php
namespace Block\Admin\Attribute\Edit;
\Mage::loadFileByClassName('Block\\Core\\Edit\\Tabs');

class Tab extends \Block\Core\Edit\Tabs
{
	public function prepareTabs()
	{
		parent::prepareTabs();
		$this->addTab('1',['lable'=>"AttributeInfomation" ,'block'=>'Block\\Admin\\Attribute\\Edit\\Tabs\\Edit']);
		/*if($this->getTableRow()->getData())
		{*/
		$this->addTab('2',['lable'=>"Options" ,'block'=>'Block\\Admin\\Attribute\\Edit\\Tabs\\Option']);
	    //}
		$this->setDefaultTab('1');

		//var_dump($this->getTableRow()->getData());
	}
}


?>