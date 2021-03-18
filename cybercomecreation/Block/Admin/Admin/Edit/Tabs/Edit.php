<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');
\Mage::loadFileByClassName('Model\\Admin');

class Edit extends \Block\Core\Table
{
	private $adminObj='';
	private $tableRow='';
	public function __construct()
	{  
		$this->setTemplate('./View/admin/admin/edit/tabs/form.php');  
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

	public function setAdmin(\Model\Admin $adminObj = null)
	{
         if(!$adminObj)
         {
         	$adminObj=\Mage::getModel('Model\\Admin');

         	  if($id=$this->getRequest()->getGet('id'))
         	  {
         	  	  $adminObj->load($id);		
         	  }
         }

         $this->adminObj=$adminObj;
         return $this;
	}

	public function getAdmin()
	{
		if(!$this->adminObj)
		{
			$this->setAdmin($this->getTableRow());
		}
	  return $this->adminObj;	
	}
}

?>