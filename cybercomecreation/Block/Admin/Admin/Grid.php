<?php
namespace Block\Admin\Admin;
 \Mage::loadFileByClassName('Block\\Core\\Table');
 \Mage::loadFileByClassName('Model\\Admin');

 class Grid extends \Block\Core\Table {

    
     protected $admin=[];
     protected $collection='';


   public function __construct(){

       $this->setTemplate('./View/admin/admin/grid.php');
   }  



   public function setAdminData(\Model\Admin\Collection $collection = null )
   {
     
      if(!$collection)
         {
            $collection=\Mage::getModel('Model\\Admin')->fetchAll();
         }

         $this->collection=$collection;
         return $this;

   }

   public function getAdminData()
   {
          if(!$this->collection)
          {
            $this->setAdminData();
          }

          return $this->collection;

   }

 
}

?>