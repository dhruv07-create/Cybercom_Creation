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
     	$q='select * from attribute_option where attributeId='.$this->attributeId;

     	return $this->fetchAll($q);
     }
 }

?>
