<?php
namespace Block\Customer\Category;
\Mage::loadFileByClassName('Block\Core\Layout');
class Category extends \Block\Core\Layout{

   protected $category='';

    public function __construct()
    {
        $this->setTemplate('View/customer/category/category.php');
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