<?php
namespace Block\Customer\Home;
\Mage::loadFileByClassName('Block\Core\Layout');
class Deal extends \Block\Core\Layout
{

    public function __construct()
    {
        // Parent::__construct();
        $this->setTemplate('View/customer/home/deal-item.php');
    }
    

    public function getDealItems()
    {
    	$model=\Mage::getModel('Model\product');
    	$r="select * from 
    	 product where dealItem='yes' and status=1;";

    	return $model->fetchAll($r); 
    }
}


?>