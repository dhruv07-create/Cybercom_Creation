<?php
namespace Block\Customer\Category;
\Mage::loadFileByClassName('Block\Core\Layout');
class Product extends \Block\Core\Layout{

    protected $category='';
    
    public function __construct()
    {
        $this->setTemplate('View/customer/category/product.php');
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

    public function getProducts()
    { 

     $categoryId=$this->getCategory()->categoryId;
     $w="SELECT categoryId FROM category WHERE pathId LIKE '%{$categoryId}%'";
     $model=\Mage::getModel('Model\product');

        $categoryIdss=$this->getCategory()->fetchAll($w);
        $ids='0';
       foreach ($categoryIdss->getData() as $key => $value) 
        {
            $ids.=','.$value->categoryId;    
        }

     $f ="SELECT * FROM product WHERE 1=1 ";
      $Filterfront=\Mage::getModel('Model\Customer\FilterFront');
    
        if($Filterfront->hasFilter())
        {
            //session_destroy();
           if($Categorys=@$Filterfront->getFilters()['category'])
           { 
              $c='';
              $c.='0';  
                foreach ($Categorys as $key => $value) 
                {
                    $c.=",{$value}";     
                }
                  $f.=" AND categoryId IN ({$c}) ";
           }  
            
           if($attributes=@$Filterfront->getFilters()['attribute'])
           {
            $do='';
                foreach ($attributes as $name => $attribute) 
                {  $h="'h'";
                    foreach ($attribute as $key => $value) 
                    {
                      $h.=",'{$value}'";
                    }
                    $do.=" AND {$name} IN ({$h}) ";     
                }
                  $f.=$do;
                 if(@!$Filterfront->getFilters()['category'])
                 {
                   $f.=" AND categoryId IN ({$ids})";
                 }
           }
              return $model->fetchAll($f);  
        }  

        
        $f.=" AND categoryId IN ({$ids}) ";
        return $model->fetchAll($f); 
    }
}
?>