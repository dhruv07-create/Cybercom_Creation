<?php
namespace Block\Customer\Layout; 

\Mage::loadFileByClassName('Block\\Core\\Table');

class Footer extends \Block\Core\Table {
 
			public function __construct(){

				$this->setTemplate('View/Customer/layout/footer.php');
			}
}


?>