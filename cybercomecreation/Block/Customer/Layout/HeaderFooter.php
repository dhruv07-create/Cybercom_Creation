<?php
namespace Block\Customer\Layout; 

\Mage::loadFileByClassName('Block\\Core\\Table');

class HeaderFooter extends \Block\Core\Table 
{
	protected $parentCategorys='';
 public function __construct()
 {

	$this->setTemplate('View/Customer/layout/header-footer.php');
 }

	public function getParentCategorys()
	{
		$sql='SELECT * FROM category WHERE parentId=0;';	

		$category=\Mage::getModel("Model\\Category");	

		return $category->fetchAll($sql);
    }

    public function getCategoryChildren($obj)
    {
        $sql="SELECT * FROM category WHERE parentId=".$obj->categoryId;
     
        $category=\Mage::getModel("Model\\Category");
     
        return $category->fetchAll($sql);

    }		
}


?>