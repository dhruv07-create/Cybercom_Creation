<?php
namespace Block\Customer\Home;
\Mage::loadFileByClassName('Block\Core\Layout');
class Home extends \Block\Core\Layout{

    public function __construct()
    {
        $this->setTemplate('View/customer/home/home.php');
    }
}
?>