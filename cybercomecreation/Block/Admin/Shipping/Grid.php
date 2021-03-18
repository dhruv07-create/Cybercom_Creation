<?php  
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\\Core\\Table');

  class Grid extends \Block\Core\Table
  {

     protected $shipping=[];
     protected $collection=null ;

     public function __construct()
     {
        $this->setTemplate('./View/admin/shipping/grid.php');
     }


     public function setShippings(\Model\Shipping\Collection $collection =null )
     {
          if(!$collection)
          {
            $collection=\Mage::getModel('Model\\Shipping')->fetchAll();
          }

       $this->collection=$collection;

       return $this;

     }

     public function getShippings(){

         if(!$this->collection){
            $this->setShippings();
         }

         return $this->collection;
     }


  }


?>