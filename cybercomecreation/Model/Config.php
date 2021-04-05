<?php
namespace Model;

\Mage::loadFileByClassName('Model\\Core\\Table');
 
 class Config extends Core\Table {

     public function __construct()
     {
          parent::__construct();
          $this->setTableName('config');
          $this->setPrimaryKey('configId');

     }
 }

?>