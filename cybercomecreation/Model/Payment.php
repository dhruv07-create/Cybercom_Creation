<?php
namespace Model;
\Mage::loadFileByClassName('Model\\Core\\Adapter');
\Mage::loadFileByClassName('Model\\Core\\Table');

class Payment extends Core\Table {

    const STATUS_AVAILABLE ='1';
   const STATUS_NOT_AVAILABLE ='2';

  public function __construct()
  {

      $this->setTableName('payment');
      $this->setPrimaryKey('methodId');
  }

  public function getStatusOption()
  {

     return [
         
          self::STATUS_AVAILABLE=>'Available',
          self::STATUS_NOT_AVAILABLE=>'Not_Available'

     ];
   

  }
 
 }


?>