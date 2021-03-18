<?php
namespace Block\Admin\Product;  

\Mage::loadFileByClassName('Block\\Core\\Table');

  class Grid extends \Block\Core\Table
  {

     protected $product=[],$collection='';


     public function __construct()
     {
        $this->setTemplate('./View/admin/product/grid.php');
     }

    
     public function setProducts($collection =null )
     {
          if(!$collection)
          {
            $collection=\Mage::getModel('Model\\Product')->fetchAll();
          }

       $this->collection=$collection;

       return $this;

     }

     public function getProducts(){

         if(!$this->collection){
            $this->setProducts();
         }

         return $this->collection;
     }

    
  }


?>