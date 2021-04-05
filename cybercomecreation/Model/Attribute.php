<?php
namespace Model;

\Mage::loadFileByClassName('Model\\Core\\Table');
 
 class Attribute extends Core\Table {

  
     public function __construct()
     {
          parent::__construct();
          $this->setTableName('attribute');
          $this->setPrimaryKey('attributeId');

     }

     public function getOptions()
     {
     	$model=\Mage::getModel('Model\\'.$this->backendModel)->setAttribute($this)->getOptions();

          return $model;
     }
 }

?>
