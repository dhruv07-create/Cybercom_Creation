<?php
namespace Block\Customer\Layout; 

\Mage::loadFileByClassName('Block\\Core\\Table');
class Message extends \Block\Core\Table
{
	  public function __construct()
	  {
	  	 $this->setTemplate('View/Customer/layout/message.php');
	  }
} 

?>