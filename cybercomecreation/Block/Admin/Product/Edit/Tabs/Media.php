<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Media extends \Block\Core\Table
{
	protected $collection='';

		public function __construct()
		{
			$this->setTemplate('./View/admin/product/edit/tabs/media.php');
		}

  public function setMedia()
   {
          $model=\Mage::getModel('Model\\Product')->setPrimaryKey('imgId')->setTableName('productimg');
        
     
         $this->collection=$model->fetchAll("select * from productimg where productId=".$this->getTableRow()->productId);
            
         return $this;     
   }		

 public function getMedia()
 {

 	   if(!$this->collection)
 	   {
 	   	  $this->setMedia();
 	   }
 	  return $this->collection; 
 }  


}

?>