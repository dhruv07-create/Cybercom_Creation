<?php
namespace Model;
\Mage::getModel('Model\\Core\\Table');

class Cms extends Core\Table
{
    public function __construct()
      {
      	  $this->setTableName('cms');
      	  $this->setPrimaryKey('pageId');
      }  
}


?>