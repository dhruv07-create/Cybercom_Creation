<?php
namespace Block\Core\Edit;

\Mage::loadFileByClassName('Model\\Core\\Table');

class Tabs extends \Block\Core\Table
{

     private $tabelRow='';
	 public function __construct()
	 {
	 	 $this->setTemplate('./View/core/edit/tabs.php');
	 	 $this->prepareTabs();
	 }

 public function setTableRow(\Model\Core\Table $row)
  {
     $this->tabelRow=$row;
     return $this;
  }

  public function getTableRow()
  {
     return $this->tabelRow;
  }

  public function prepareTabs()
  {
  	 return $this;
  }

}


?>