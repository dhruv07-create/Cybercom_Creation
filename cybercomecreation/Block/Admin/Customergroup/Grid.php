<?php
namespace Block\Admin\Customergroup;
 \Mage::loadFileByClassName('Block\\Core\\Table');
 \Mage::loadFileByClassName('Model\\Customergroup');

 class Grid extends \Block\Core\Table {

    
     protected $category=[];
     protected $collection=null;


   public function __construct(){

       $this->setTemplate('./View/admin/customergroup/grid.php');
   }  



   public function setCatogoryGroups(\Model\Customergroup\Collection $collection = null ){

   	  if(!$this->collection)
        {
               $collection=\Mage::getModel('Model\\Customergroup')->fetchAll();
        }
           $this->collection=$collection;

   	  	return $this;   
   }

   public function getCatogoryGroups()
   {
   	    if(!$this->collection)
   	       {
   	       	  $this->setCatogoryGroups();
   	       } 	

   	    return $this->collection;   
   }

 
}

?>