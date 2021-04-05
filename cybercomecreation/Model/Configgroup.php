<?php
namespace Model;

\Mage::loadFileByClassName('Model\\Core\\Table');
 
 class Configgroup extends Core\Table {

     public function __construct()
     {
          parent::__construct();
          $this->setTableName('config_group');
          $this->setPrimaryKey('groupId');

     }

     public function getConfigs()
     {
     	$config = \Mage::getModel('Model\config');
     	$z="SELECT * from {$config->getTableName()} WHERE groupId={$this->groupId}";

     	return $config->fetchAll($z);
     }
 }

?>