<?php
namespace Block\Admin\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');
class Other extends \Block\Core\Table
{
	public function __construct()
	{
		$this->setTemplate("./View/admin/shipping/edit/tabs/other.php");
	}
}

?>