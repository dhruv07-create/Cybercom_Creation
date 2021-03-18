<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');
class Image extends \Block\Core\Table
{
	
	public function __construct()
	{
        $this->setTemplate('./View/admin/category/edit/tabs/image.php');	
	}

}
?>