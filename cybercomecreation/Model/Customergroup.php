<?php
namespace Model;

 \Mage::loadFileByClassName('Model\\Core\\Adapter');
\Mage::loadFileByClassName('Model\\Core\\Table');

 class Customergroup extends Core\Table 
 {    
     public function __construct()
     {
          parent::__construct();
          $this->setTableName('customer_group');
          $this->setPrimaryKey('groupId');

     }

 }

?>