<?php
namespace Block\Customer\Home;
\Mage::loadFileByClassName('Block\Core\Layout');
class Brand extends \Block\Core\Layout
{

    public function __construct()
    {
        // Parent::__construct();
        $this->setTemplate('View/customer/home/brand.php');
    }

    public function getBrands()
    {
    	$brand=\Mage::getModel('Model\Brand');
    	return $brand->fetchAll();
    }
    
}


?>