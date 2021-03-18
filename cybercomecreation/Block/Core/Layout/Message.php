<?php
namespace Block\Core\Layout; 

\Mage::loadFileByClassName('Block\\Core\\Table');
class Message extends \Block\Core\Table
{
	  public function __construct()
	  {
	  	 $this->setTemplate('View/Core/layout/message.php');
	  }
} 

?>