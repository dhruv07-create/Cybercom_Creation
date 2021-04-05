<?php
namespace Model\Brand;

\Mage::loadFileByClassName('Model\\Attribute\\Option');
 
 class Option extends \Model\Attribute\option {
    
    
   public function getOptions()
   {
   	try{
   	 if(!$this->getAttribute()->attributeId)
   	 {
   	 	throw new Exception("Error Processing Request", 1);
   	 }

   	  $aa="SELECT 
      `brandId` as optionId,
      `name`,
    '{$this->getAttribute()->attributeId}' As attributeId
  
   	   FROM brand
   	   ";
      
    
   	   $model=\Mage::getModel("Model\Brand");
   $collection=$model->fetchAll($aa);


   	   if(!$collection->getData())             
   	   {
   	   	return null;
   	   }

   	   return $collection;

   	  }catch(Exception $e)
   	  {
   	  	echo $e->getMessage();
   	  } 

   }

 }

?>