<?php
namespace Model\Attribute;

\Mage::loadFileByClassName('Model\\Core\\Table');
 
 class Option extends \Model\Core\Table {
    
    protected $att='';
     public function __construct()
     {
          parent::__construct();
          $this->setTableName('attribute_option');
          $this->setPrimaryKey('optionId');

     }

    public function setAttribute($value)
    {
        $this->att=$value;
        return $this;
    }

   public function getAttribute()
   {
   	   return $this->att;
   }

   public function getOptions()
   {   

   	try{
   	 if(!$this->getAttribute()->attributeId)
   	 {
   	 	throw new Exception("Error Processing Request", 1);
   	 }

   	  $aa="SELECT * 
   	   FROM {$this->getTableName()}
       WHERE attributeId={$this->getAttribute()->attributeId}
   	   ";

   	   $model=\Mage::getModel("Model\Attribute\Option");
   	   $collection=$model->fetchAll($aa);

   	   if(!$model)
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