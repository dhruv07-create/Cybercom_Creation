<?php
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Edit extends \Block\Core\Table
{
	private $attribute=null ;
	private $tableRow=null;
	public function __construct()
	{
		$this->setTemplate('./View/admin/attribute/edit/tabs/edit.php');
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

	public function getAttribute()
	{
		 if(!$this->attribute)
		 {
		 	$this->setAttribute($this->getTabelRow());
		 }
		return $this->attribute; 
	}

	public function setAttribute(\Model\Attribute $attribute=null )
	{
		if(!$attribute)
		{
			$attribute=\Mage::getModel('Model\\Attribute');
			if($id=$this->getRequest()->getGet('id'))
			{
				$attribute->load($id);
			}	
		}

	    return $this->attribute=$attribute;

	}

	public function getBackendTypeOption()
    {
    	return [
  			'varchar(90)'=>'Varchar',
  			'int'=>'Int',
  			'decimal'=>'Decimal',
  			'text'=>'Text'          
 
    	];
    }

    public function getEntityType()
    {
    	return [
  			'product'=>"Product",
  			'customer'=>"Customer"          
    	];
    }    

    public function getInputTypeOption()
    {
    	return [
    		'radio'=>'Radio',
    		'checkbox'=>'Checkbox',
    		'textarea'=>'TextArea',
    		'select'=>'Select',
        'multi'=>'Multipal'
    	];
    }
}


?>