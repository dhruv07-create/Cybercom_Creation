<?php
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\\Core\\Admin');

class GroupPrice extends \Controller\Core\Admin
{
	 public function saveAction()
	 {
	 	try {

	 		$productId=$this->getRequest()->getGet('id');
	 		$groupData=$this->getRequest()->getPost('groupPrice');
 			

 			if(isset($groupData['Exist']))
 			{
		  	foreach ($groupData['Exist'] as $groupId => $groupPrice) 
		 	{
			    $priceGroup=\Mage::getModel('Model\\Product\\Group\\Price');  
		 		$query="SELECT * FROM {$priceGroup->getTableName()} where customergroupId={$groupId} AND productId={$productId} ";

		 		$priceGroup->fetchRow($query);

		 		$priceGroup->groupprice=$groupPrice;

		 		$priceGroup->save();

	 	   }
	       }

	       if(isset($groupData['New']))
	       {
		 	foreach ($groupData['New'] as $groupId => $groupPrice)
		 	{
	 			$priceGroup=\Mage::getModel('Model\\Product\\Group\\Price');  
		 		
		 		$priceGroup->productId=$productId;

		 		$priceGroup->groupprice=$groupPrice;

		 		$priceGroup->customergroupId=$groupId;

		 		$priceGroup->save();

	 		}
	 	   }

	    $this->redirect('edit','admin\product',null,true);	

	 	 } catch (Exception $e) {
	 	 	
	 	 	echo $e->getMessage();
	 	 } 
	 }
}

?>