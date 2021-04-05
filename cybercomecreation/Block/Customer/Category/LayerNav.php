<?php
namespace Block\Customer\Category;
\Mage::loadFileByClassName('Block\Core\Layout');
class LayerNav extends \Block\Core\Layout{
     
    private $category=''; 
    public function __construct()
    {
        $this->setTemplate('View/customer/category/layer_nav.php');
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

    public function getCategoryChildren()
    {
    	$q="SELECT * 
    	FROM {$this->getCategory()->getTableName()} 
    	WHERE parentId={$this->getCategory()->categoryId}";

        $result =$this->getCategory()->fetchAll($q);

        if(!$result->getData())
        {
        	return null;
        }

       return $result; 
    }

    public function getAttributes()
    {
       $model=\Mage::getModel("Model\attribute"); 
        $aa="SELECT *
        FROM attribute
        ";
         
        $collection=$model->fetchAll($aa);
        
        return $collection; 
    }

}
?>