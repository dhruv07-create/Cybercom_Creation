<?php  
namespace Block\Admin\Configgroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Config extends \Block\Core\Table
{
	protected $configs='';
	private $tableRow='';
	public function __construct()
	{
		$this->setTemplate('./View/admin/configgroup/edit/tabs/config.php');
	}

	public function setTableRow(\Model\Core\Table $rowData)
    {
       $this->tableRow=$rowData;
       return $this;
    }

    public function getTabelRow()
    {
    	 return $this->tableRow;
    }

	public function setconfig(\Model\Config\Collection $collection =null)
	{
    
         if(!$collection)
         {
         
         $config=\Mage::getModel('Model\\Config');
         $groupId=$this->getTabelRow()->groupId;
         $q="SELECT *
         FROM config
         WHERE groupId={$groupId} ORDER BY configId ASC;
         ";
         $collection=$config->fetchAll($q);

         }
       $this->configs=$collection;
       return $this;   
	}

	public function getConfig()
	{
		if(!$this->configs)
		{
			  $this->setconfig();
		}
		  return $this->configs;				
	}
}

?>