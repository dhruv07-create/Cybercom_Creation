<?php
namespace Model;

\Mage::loadFileByClassName('Model\\Core\\Table');
 
 class Admin extends Core\Table {

   const STATUS_AVAILABLE = 1;
   const STATUS_NOT_AVAILABLE = 2;
    
     public function __construct()
     {
          parent::__construct();
          $this->setTableName('admin');
          $this->setPrimaryKey('userId');

     }

     public function getStatusOption()
     {

           return [
              
               self::STATUS_AVAILABLE=>'Available',
               self::STATUS_NOT_AVAILABLE=>'Not-Available'
           ];

     }

 }

?>