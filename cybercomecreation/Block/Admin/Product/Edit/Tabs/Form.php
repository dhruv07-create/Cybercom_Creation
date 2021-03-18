<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\\core\\Table');
class Form extends \Block\core\Table
{
    private $modelObj=null;

	public function __construct()
	{
		$this->setTemplate('./View/admin/product/edit/tabs/form.php');
	}

	public function setProduct(\Model\Product $modelObj = null)
	{
		if(!$modelObj)
		{
			 $modelObj=\Mage::getModel('Model\\Product');
			 if($id=$this->getRequest()->getGet('id'))
			 { 	
				$modelObj->load($id);
			 }
		}
			$this->modelObj=$modelObj;
			return $this;

	}

	public function getProduct()
	{
        if(!$this->modelObj)
        {
        	$this->setProduct($this->getTableRow());
        }

        return $this->modelObj;
	}

	
}
?>