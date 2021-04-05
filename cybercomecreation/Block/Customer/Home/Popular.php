<?php
namespace Block\Customer\Home;
\Mage::loadFileByClassName('Block\Core\Layout');
class Popular extends \Block\Core\Layout
{

    public function __construct()
    {
        // Parent::__construct();
        $this->setTemplate('View/customer/home/popular_item.php');
    }

    public function getPopularItems()
    {
    	$product=\Mage::getModel('Model\product');
    	$r="SELECT * FROM {$product->getTableName()} WHERE mostPopular='yes' 
    	and status=1 ; ";
    	return $product->fetchAll($r);
    } 
}


?>