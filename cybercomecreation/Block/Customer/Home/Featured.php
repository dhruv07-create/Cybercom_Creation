<?php
namespace Block\Customer\Home;
\Mage::loadFileByClassName('Block\Core\Layout');
class Featured extends \Block\Core\Layout
{

    public function __construct()
    {
        $this->setTemplate('View/customer/home/featured_category.php');
    }

    public function getFeaturedCategorys()
    {
    	 $Featured=\Mage::getModel('Model\Category');
          $sql='Select * from category where featured="yes" LIMIT 0,5;';

          return $Featured->fetchAll($sql);

    }
  
    
}


?>