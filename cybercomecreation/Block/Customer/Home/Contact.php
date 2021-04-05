<?php
namespace Block\Customer\Home;
\Mage::loadFileByClassName('Block\Core\Layout');
class Contact extends \Block\Core\Layout{

    public function __construct()
    {
        // Parent::__construct();
        $this->setTemplate('View/customer/home/contact_us.php');
    }
}
?>