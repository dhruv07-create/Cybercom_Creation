<?php
namespace Block\Admin\Configgroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');
\Mage::loadFileByClassName('Model\\Configgroup');

class Edit extends \Block\Core\Table
{
	private $ConfiggroupObj='';
	private $tableRow='';
	public function __construct()
	{  
		$this->setTemplate('./View/Admin/Configgroup/edit/tabs/form.php');  
	}

  public function setTableRow(\Model\Core\Table $row)
  {
     $this->tableRow=$row;
     return $this;
  }

  public function getTableRow()
  {   
     return $this->tableRow;
  }

	public function setConfigGroup(\Model\Configgroup $ConfiggroupObj = null)
	{
         if(!$ConfiggroupObj)
         {
         	$ConfiggroupObj=\Mage::getModel('Model\\Configgroup');

         	  if($id=$this->getRequest()->getGet('id'))
         	  {
         	  	  $ConfiggroupObj->load($id);		
         	  }
         }

         $this->ConfiggroupObj=$ConfiggroupObj;
         return $this;
	}

	public function getConfigGroup()
	{
		if(!$this->ConfiggroupObj)
		{
			$this->setConfigGroup($this->getTableRow());
		}
	  return $this->ConfiggroupObj;	
	}
}

?>