<?php  
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Option extends \Block\Core\Table
{
	protected $options='';
	private $tableRow='';
	public function __construct()
	{
		$this->setTemplate('./View/admin/attribute/edit/tabs/option.php');
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

	public function setOptions(\Model\Attribute\Option\Collection $collection =null)
	{
    
         if(!$collection)
         {
         
         $option=\Mage::getModel('Model\\Attribute\\Option');
         $attrId=$this->getTabelRow()->attributeId;
         $q="SELECT *
         FROM attribute_option 
         WHERE attributeId={$attrId} ORDER BY sortOrder ASC;
         ";

         $collection=$option->fetchAll($q);

         }
       $this->options=$collection;
       return $this;   
	}

	public function getOption()
	{
		if(!$this->options)
		{
			  $this->setOptions();
		}
		  return $this->options;				
	}
}

?>