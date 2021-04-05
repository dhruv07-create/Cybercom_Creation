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

    public function getCategoryOptions()
    {
    	$cateogry=\Mage::getModel('Model\category');
    	$o="SELECT categoryId,name FROM category";
    	$options=$cateogry->getAdapter()->fetchPairs($o);
    	
    	$que="SELECT categoryId,pathId FROM category";
    	$cateogryOption=$cateogry->getAdapter()->fetchPairs($que);

    	foreach ($cateogryOption as $categoryId => &$pathId) {
    		   $pathId=explode('=',$pathId); 
    		   foreach ($pathId as $key => &$id) {
    		    	# code...
    		     if(array_key_exists($id,$options))
    		     {
    		     	 $id=$options[$id];
    		     }
    		    } 
              $pathId=implode('=',$pathId);
    		}

    	return $cateogryOption;		
    }
	
}
?>