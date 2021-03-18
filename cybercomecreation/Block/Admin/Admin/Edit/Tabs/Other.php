<?php
namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileByClassName('Block\\Core\\Table');

class Other extends \BLock\Core\Table
{
	private $tabelRow='';
	public function __construct()
	{
		$this->setTemplate('./View/admin/admin/edit/tabs/other.php');
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







}

?>