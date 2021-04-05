<?php
namespace Model\Category;
\Mage::getModel('Model\\Core\\Table');

class Image extends \Model\Core\Table
{
    public function __construct()
      {
      	  $this->setTableName('categoryimg');
      	  $this->setPrimaryKey('imageId');
      }  
}


?>