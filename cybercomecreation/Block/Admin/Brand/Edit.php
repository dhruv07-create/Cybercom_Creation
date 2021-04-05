<?php
namespace Block\Admin\Brand;

\Mage::loadFileByClassName("Block\Core\Table");

  class Edit extends \Block\Core\Table
  {

  	protected $model='';
  	public function __construct()
  	{
  		$this->setTemplate('./View/admin/brand/form.php');
  	}

  	public function setBrand(\Model\Brand $model)
  	{
 	  if($model)
 	  {
 	     $this->model=$model;
 	     return  $this;
 	  }
    }

    public function getBrand()
    {
    	if(!$this->model)
    	{
    		$this->setBrand($this->getTableRow());
    	}
      return $this->model;	
    }
  }

?>