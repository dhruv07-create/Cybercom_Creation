<?php
namespace Block\Admin\Category\Edit\Tabs; 
\Mage::loadFileByClassName('Block\\Core\\Table');

class Form extends \Block\Core\Table
{
     protected $categoryObj=null;
     protected $categoryOption='';


	  public function __construct()
	  {
	  	 $this->setTemplate('./View/admin/category/edit/tabs/form.php');
	  }

     public function setCategory($categoryObj = NULL){  

       if($categoryObj){
         
         $this->categoryObj=$categoryObj;
         return $this;
       }

      if($id=$this->getRequest()->getGet('id'))
      {
      	  $model=\Mage::getModel('Model\\Category');

      	  $model->load($id);
      }else{

      	  $model=\Mage::getModel('Model\\Category');
      } 

      $this->categoryObj=$model;

      return $this;
   }

   public function getCategory(){
        
        if(!$this->categoryObj){

        	$this->setCategory($this->getTableRow());

        }

 		return $this->categoryObj;

   }


    public function getCategoryOption()
   {
       $category=\Mage::getModel('Model\\Category');
       $option = $category->getAdapter()->connection()->fetchPairs('select categoryId,name from category;');

        if($this->getCategory()->pathId)
        {
         $qq="SELECT categoryId,pathId from category where pathId NOT LIKE '{$this->getCategory()->pathId}%'";
        }else{
         $qq="SELECT categoryId,pathId from category where pathId";
        }
   
      $this->categoryOption=$category->getAdapter()->connection()->fetchPairs($qq);


      if($this->categoryOption)
      {
         foreach ($this->categoryOption as $key => &$pathId) 
         {
             $pathIds=explode('=',$pathId);
          
             foreach ($pathIds as  &$id) 
             { 

                if(array_key_exists($id,$option)) 
                {
                    $id=$option[$id];
                }
             }

            $pathId=implode('=', $pathIds); 
         }

         $this->categoryOption=[''=>'Option-Root']+$this->categoryOption;

        return $this->categoryOption;
      }         
  }

  
}


?>