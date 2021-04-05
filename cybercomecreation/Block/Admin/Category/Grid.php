<?php 
namespace Block\Admin\Category;

\Mage::loadFileByClassName("Block\Core\Grid");

  class Grid extends \Block\Core\Grid
  {

   protected $categoryOption=''; 

    public function getTitle()
    {  return 'Category';

    }

   public function prepareCollection()
    {
       $category=\Mage::getModel('Model\Category');
     $q="SELECT * FROM {$category->getTableName()}";
      
       if($this->getFilter()->hasFilter())
       {
         $q.=" WHERE 1=1";
         foreach ($this->getFilter()->getFilters() as $type => $filter)
         {
             if($type=='text')
             {
                foreach ($filter as $key => $value) 
                    $q .=" AND {$key} LIKE '%{$value}%' ";     
                }
             if($type=='number')
             {
                foreach ($filter as $key => $value) 
                {  if($key=='status') { $value= array_search($value,$category->getStatusOption());}
                
                    $q .=" AND {$key}={$value} ";     
                }      
             }

              if($type=='enum')
             {
                foreach ($filter as $key => $value) 
                {
                    $q .=" AND {$key}='{$value}' ";     
                }      
             }
             }
         } 

       $pager=$this->getPager();
       $pager->setTotalRecords($category->getAdapter()->fetchOne($q));
       $pager->setRecordsPerPage(2);
       $pager->calculate();
       $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";

     $this->setCollection($category->fetchAll($q));
       }
 
 public function setPager($pager)
 {
     $this->pager=$pager;
     return $this;
 }

 public function getPager()
 {
    return $this->pager;
 } 
       
   public function prepareColumns()
   {
      $this->addColumn('categoryId',
         
         [ 
          'lable'=>'Category Id',
          'field'=>'categoryId'
          ,'type'=>'number'
         ]
      );

      $this->addColumn('name',
         
         [ 
          'lable'=>'Name',
          'field'=>'name',
          'type'=>'text'
         ]
      );

      $this->addColumn('Featured',
         
         [ 
          'lable'=>'Featured',
          'field'=>'featured'
          ,'type'=>'text'
         ]
      );

      $this->addColumn('Image',

        [
          'lable'=>'Image',
          'field'=>'image',
          'type'=>'image'
        ]
      );
      $this->addColumn('status',
        
         [
          'lable'=>'Status',
          'field'=>'status',
          'type'=>'number'
         ]
      );

  $this->addColumn('description',
        
         [
          'lable'=>'Description',
          'field'=>'description',
          'type'=>'text'
         ]
      );
      $this->addColumn('pathId',
        
         [
          'lable'=>'Path Id',
          'field'=>'pathId',
          'type'=>'text'
         ]
      ); 

        $this->addColumn('createddate',
         
         [ 
          'lable'=>'CreatedDate',
          'field'=>'createddate',
          'type'=>'text'
         ]
      );       
   }
   public function getFilter()
   {
      return \Mage::getModel('Model\Core\filter');
   }
   public function prepareActions()
    {
      $this->addAction('Edit',
          [
             'lable'=>'Edit',
             'class'=>'class="btn btn-success"',
             'method'=>'getEditURl' 
          ]
      );
       $this->addAction('Delete',
          [
             'lable'=>'Delete',
             'class'=>'class="btn btn-danger"',
             'method'=>'getDeleteURl' 
          ]
      );
    } 
       
  public function getName($category)
   {
       if(!$this->categoryOption)
       {
       $category1=\Mage::getModel('Model\\Category');
       $this->categoryOption = $category1->getAdapter()->connection()->fetchPairs('select categoryId,name from '.$category->getTableName());
       }

       $pathIds=explode('=',$category->pathId);

       foreach ($pathIds as &$id) {

          if(array_key_exists($id,$this->categoryOption))
          {
            $id=$this->categoryOption[$id];
          }
       }
       return implode('=',$pathIds);

   }

    public function prepareButtons()
    {
        $this->addButton('Add'
          ,
          [
            'lable'=>'AddCategory',
            'class'=>"class='btn btn-primary'",
            'method'=>'getAddCategoryURl'
          ]
        );
    }
    

    public function getEditURl($row)
    {
       return $this->getUrl('edit',null,['id'=>$row->categoryId]);
    }

    public function getFieldValue($row,$fild)
    {   if($fild=='name'){
         return $this->getName($row);
       }
       if($fild == 'status')
       { $statusOp=\Mage::getModel('Model\Category')->getStatusOption();
         return $statusOp[$row->$fild];
       }

       return $row->$fild;
    }

    public function getDeleteURl($row)
      {
         return $this->getUrl('delete',null,['id'=>$row->categoryId]); 
      }

    public function getAddCategoryURl()
    {
       return $this->getUrl('form');
    }       
  }

/*



namespace Block\Admin\category;
 \Mage::loadFileByClassName('Block\\Core\\Table');
 \Mage::loadFileByClassName('Model\\Category');

 class Grid extends \Block\Core\Table {

    
     protected $category=[];
     protected $collection=null;
     protected $categoryOption=null;


   public function __construct(){

       $this->setTemplate('./View/admin/category/grid.php');
   }  



   public function setCategorys(\Model\Category\Collection $collection = null ){

   	  if(!$collection)
        {
                $Attribute=\Mage::getModel('Model\\Category');
               $q='select * From category';
               $this->getPager()->setTotalRecords($Attribute->getAdapter()->fetchOne($q));
               $this->getPager()->setRecordsPerPage(28);
               $this->getPager()->calculate();
               $limit = ($this->getPager()->getCurrentPage()-1)*$this->getPager()->getRecordsPerPage();
               $collection=$Attribute->fetchAll("select * from category  

                LIMIT {$limit} ,{$this->getPager()->getRecordsPerPage()}");
        }
           $this->collection=$collection;

   	  	return $this;   
   }

   public function getCategorys()
   {
   	    if(!$this->collection)
   	       {
   	       	  $this->setCategorys();
   	       } 	

   	    return $this->collection;   
   }

  
   public function getName($category)
   {
       if(!$this->categoryOption)
       {
       $category1=\Mage::getModel('Model\\Category');
       $this->categoryOption = $category1->getAdapter()->connection()->fetchPairs('select categoryId,name from '.$category->getTableName());
       }

       $pathIds=explode('=',$category->pathId);

       foreach ($pathIds as &$id) {

          if(array_key_exists($id,$this->categoryOption))
          {
            $id=$this->categoryOption[$id];
          }
       }
       return implode('=',$pathIds);

   }
 
}
 */
?>