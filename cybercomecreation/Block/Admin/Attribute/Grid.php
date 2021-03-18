<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Grid extends \Block\Core\Table

{ 
    private $attributes=null;

    public function __construct()
    {
    	$this->setTemplate('./View/Admin/Attribute/grid.php');
    }


     public function setAttributes(\Model\Category\Collection $collection = null ){

   	  if(!$collection)
        {
               $collection=\Mage::getModel('Model\\Attribute')->fetchAll("select * from attribute order by sortOrder asc");
        }
           $this->attributes=$collection;

   	  	return $this;   
   }

   public function getAttributes()
   {
   	    if(!$this->attributes)
   	       {
   	       	  $this->setAttributes();
   	       } 	

   	    return $this->attributes;   
   }
}

?>
