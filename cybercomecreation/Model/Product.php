<?php
namespace Model;
\Mage::getModel('Model\\Core\\Table');

class Product extends Core\Table {

    
   const STATUS_AVAILABLE ='1';
   const STATUS_NOT_AVAILABLE ='2';

  public function __construct()
  {

      $this->setTableName('product');
      $this->setPrimaryKey('productId');
  }

  public function getStatusOption()
  {

     return [
         
          self::STATUS_AVAILABLE=>'AVAILABLE',
          self::STATUS_NOT_AVAILABLE=>'NOT_AVAILABLE'

     ];
   

  }

  public function getSmall()
  {   
      $productImg=\Mage::getModel('Model\ProductMedia');
      $q="select * from {$productImg->getTableName()} where productId={$this->productId} AND small='yes';";
      return $productImg->fetchRow($q);  
  }   

  public function getThumb()
  {   
      $productImg=\Mage::getModel('Model\ProductMedia');
      $q="select * from {$productImg->getTableName()} where productId={$this->productId} AND thumb='yes';";
      return $productImg->fetchRow($q); 
  }   
   
 public function getBase()
  {   
       $productImg=\Mage::getModel('Model\ProductMedia');
      $q="select * from {$productImg->getTableName()} where productId={$this->productId} AND base='yes';";
      return $productImg->fetchRow($q);   
  }

  public function getGallery()
  {   
      $productImg=\Mage::getModel('Model\ProductMedia');
      $q="select * from {$productImg->getTableName()} where productId={$this->productId} AND gallery='yes';";
      return $productImg->fetchAll($q);  
  }

 } 
?>