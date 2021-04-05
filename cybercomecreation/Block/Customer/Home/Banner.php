<?php
namespace Block\Customer\Home;
\Mage::loadFileByClassName('Block\Core\Layout');
class Banner extends \Block\Core\Layout
{

    public function __construct()
    {
        // Parent::__construct();
        $this->setTemplate('View/customer/home/banner.php');
    }
    
}


?>