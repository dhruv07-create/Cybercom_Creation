<?php
namespace Model;
\Mage::loadFileByClassName('Model\\Core\\Adapter');
\Mage::loadFileByClassName('Model\\Core\\Table');
 
 class Category extends Core\Table 
 {

   const STATUS_AVAILABLE = 1;
   const STATUS_NOT_AVAILABLE = 2;
    
     public function __construct()
     {
          parent::__construct();
          $this->setTableName('category');
          $this->setPrimaryKey('categoryId');

     }

     public function getStatusOption()
     {

           return [
               self::STATUS_AVAILABLE=>'Available',
               self::STATUS_NOT_AVAILABLE=>'Not-Available'
           ];

     }


     public function updatePathId()
     {
         if($this->parentId)
                  {
                     $parent=\Mage::getModel('Model\\Category')->load($this->parentId);

                     if($parent)
                     {
                        $this->pathId=$parent->pathId."=".$this->categoryId;
                        $this->save();
                     }
                  }else{

                    $pro->pathId=$pro->categoryId;
                    $this->save();
                  }
         
         }

      public function updateChildrenPathIds($categoryPath)
         {
               $que="select * from category where pathId LIKE '{$categoryPath}%'";

                $children = $this->fetchAll($que);


               if($children->getData()){

                foreach ($children->getData() as $key => $value) {
                    
                       $value->updatePathId();
                }
                  
               }   
         }   

 }

?>