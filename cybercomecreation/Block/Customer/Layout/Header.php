<?php
namespace Block\Customer\Layout; 

 \Mage::loadFileByClassName('Block\\Core\\Table');

class Header extends \Block\Core\Table {

	public function __construct ()
	{
		 $this->setTemplate('View/Customer/layout/header.php');
	}
}

?>