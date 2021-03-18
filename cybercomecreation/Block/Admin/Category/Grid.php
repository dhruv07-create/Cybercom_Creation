<?php
namespace Block\Admin\category;
 \Mage::loadFileByClassName('Block\\Core\\Table');
 \Mage::loadFileByClassName('Model\\Category');

 class Grid extends \Block\Core\Table {

    
     protected $category=[];
     protected $collection=null;
     protected $categoryOption=null;


   public function __construct(){

       $this->setTemplate('./View/admin/category/grid.php');
   }  



   public function setCategorys(\Model\Category\Collection $collection = null ){

   	  if(!$collection)
        {
               $collection=\Mage::getModel('Model\\Category')->fetchAll("select * from category order by pathId asc");
        }
           $this->collection=$collection;

   	  	return $this;   
   }

   public function getCategorys()
   {
   	    if(!$this->collection)
   	       {
   	       	  $this->setCategorys();
   	       } 	

   	    return $this->collection;   
   }

  
   public function getName($category)
   {
       if(!$this->categoryOption)
       {
       $category1=\Mage::getModel('Model\\Category');
       $this->categoryOption = $category1->getAdapter()->connection()->fetchPairs('select categoryId,name from '.$category->getTableName());
       }

       $pathIds=explode('=',$category->pathId);

       foreach ($pathIds as &$id) {

          if(array_key_exists($id,$this->categoryOption))
          {
            $id=$this->categoryOption[$id];
          }
       }

       return implode('=',$pathIds);

   }
 
}

?>