<?php
namespace Block\Customer\Category;
\Mage::loadFileByClassName('Block\Core\Table');
class Banner extends \Block\Core\Table{

   protected $category='';
    public function __construct()
    {
        $this->setTemplate('View/customer/category/banner.php');
    }

    public function setCategory($category)
    {
       $this->category=$category;
       return $this;
    }

    public function getCategory()
    {
    	return $this->category;
    }

    
}
?>