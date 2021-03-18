<?php
namespace Block\Admin\Admin\Edit;
\Mage::loadFileByClassName('Block\\Core\\Edit\\Tabs');

class Tab extends \Block\Core\Edit\Tabs
{
  
	public function prepareTabs()
    {  
        $this->addTab('1',['lable'=>'AdminInfo','block'=>'Block\\Admin\\Admin\\Edit\\Tabs\\Edit']);
		 
		$this->addTab('2',['lable'=>'other','block'=>'Block\\Admin\\Admin\\Edit\\Tabs\\Other']);
		
		$this->setDefaultTab('1');
    }	    
}
?>