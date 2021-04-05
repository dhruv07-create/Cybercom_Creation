<?php
 //magic cote
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class GroupPrice extends \Block\Core\Table
{
	protected $categoryGroup='';
	protected $product='';
	 public function __construct()
	 {
	 	    $this->setTemplate("./View/admin/product/edit/tabs/group_price.php");
	 }


	 public function setProduct(\Model\Product $product = null)
	 {
	 	 if(!$product)
	 	 {
	 	 	$product=\Mage::getModel('Model\\Product')->load($this->getRequest()->getGet('id'));
	 	 }
	 	$this->product=$product;
	 	return $this; 
	 }

     public function getProduct()
     {
     	if(!$this->product)
     	{
     		$this->setProduct($this->getTableRow());
     	}
       return $this->product;	
     }


	 public function setCategoryGroup(\Model\Customergroup $categoryGroup = null)
	 {
	   	  if(!$categoryGroup)
	   	  {     
	   	  	   $query="SELECT cg.*,pcgp.*,
	   	  	   if(p.price is null,'{$this->getProduct()->price}',p.price) as price
	   	  	   FROM customer_group cg 
	   	  	   LEFT JOIN product_customer_group_price pcgp
	   	  	   		ON cg.groupId=pcgp.customergroupId
	   	  	           AND
     	   	  	   		pcgp.productId='{$this->getProduct()->productId}'
	   	  	   LEFT JOIN product p
	   	  	   		ON pcgp.productId=p.productId
    	  	   		;
			
	   	  	   ";
	   	  	   $categoryGroup=\Mage::getModel('Model\\Customergroup')->fetchAll($query);
	   	  }

	   	  $this->categoryGroup=$categoryGroup;
	   	  return $this;
	 }

	 public function getCategoryGroup()
	 {
	 	if(!$this->categoryGroup)
	 	{
	 		$this->setCategoryGroup();
	 	}
	   return $this->categoryGroup;	
	 }

	
}



?>