<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Image extends \Block\Core\Table
{
	protected $collection='';

		public function __construct()
		{
			$this->setTemplate('./View/admin/category/edit/tabs/image.php');
		}

  public function setCollection()
   {
          $model=\Mage::getModel('Model\Category\Image');
        
     
         $this->collection=$model->fetchAll("select * from categoryimg where categoryId=".$this->getTableRow()->categoryId);
 
         return $this;     
   }		

 public function getCollection()
 {

 	   if(!$this->collection)
 	   {
 	   	  $this->setCollection();
 	   }
 	  return $this->collection; 
 }  


}

?>