<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\\Core\\Table');
class Attribute extends \Block\Core\Table
{
	 protected $attribute=''; 

    public function __construct()
	{
	    $this->setTemplate('./View/admin/product/edit/tabs/attribute.php');	 
	}	
  
    public function getAttribute()
	{
		 if(!$this->attribute)
		 {
		 	$this->setAttribute();
		 }
		return $this->attribute; 
	}

	public function setAttribute(\Model\Attribute $attribute=null )
	{
		if(!$attribute)
		{
			$attribute=\Mage::getModel('Model\\Attribute');
				
		}
	  $this->attribute=$attribute;
	  
	  return $this;		

  }

  public function getAttributes()
  {
  	  $sql="SELECT *
  	  From {$this->getAttribute()->getTableName()}
  	  WHERE entityTypeId='product'";

  	  return $this->getAttribute()->fetchAll($sql);
  }
}

?>