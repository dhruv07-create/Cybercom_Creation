<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\\Core\\Grid');

class Grid extends \Block\Core\Grid

{ 

  public function prepareCollection()
   {
          
    $attribute=\Mage::getModel('Model\Attribute');
    $q="SELECT * FROM {$attribute->getTableName()}";
      
       if($this->getFilter()->hasFilter())
       {
         $q.=" WHERE 1=1";
         foreach ($this->getFilter()->getFilters() as $type => $filter)
         {
             if($type=='text')
             {
                foreach ($filter as $key => $value) 
                {
                    $q .=" AND {$key} LIKE '%{$value}%' ";     
                }
             }
             if($type=='number')
             {
                foreach ($filter as $key => $value) 
                {
                    $q .=" AND {$key}={$value} ";     
                }      
             }
         }    
       }

       $pager=$this->getPager();
       $pager->setTotalRecords($attribute->getAdapter()->fetchOne($q));
       $pager->setRecordsPerPage(2);
       $pager->calculate();
       $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";
          
     $this->setCollection($attribute->fetchAll($q));
      return $this;    
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

   public function getTitle()
   {
      return 'Attribute';
   }


   /*  public function setAttributes(\Model\Category\Collection $collection = null ){

   	  if(!$collection)
        {      $Attribute=\Mage::getModel('Model\\Attribute');
               $q='select * From attribute';
               $this->getPager()->setTotalRecords($Attribute->getAdapter()->fetchOne($q));
               $this->getPager()->setRecordsPerPage(2);
               $this->getPager()->calculate();
               $limit = ($this->getPager()->getCurrentPage()-1)*$this->getPager()->getRecordsPerPage();
               $collection=$Attribute->fetchAll("select * from attribute  order by sortOrder asc 

                LIMIT {$limit} ,{$this->getPager()->getRecordsPerPage()}");
        }
           $this->attributes=$collection;

   	  	return $this;   
   }*/

  public function getFilter()
  {
     return \Mage::getModel("Model\Core\Filter");
  }
 
  public function prepareColumns()
  {
     $this->addColumn('AttributeId',
        [
           "lable"=>'Attribute Id',
           'field'=>'attributeId',
           'type'=>'number'
        ]        
      );
          $this->addColumn('EntityTypeId',
        [
           "lable"=>'EntityTypeId',
           'field'=>'entityTypeId',
           'type'=>'text'
        ]        
      );
     $this->addColumn('Name',
        [
           "lable"=>'Name',
           'field'=>'name',
           'type'=>'text'
        ]        
      );
     $this->addColumn('Code',
        [
           "lable"=>'Code',
           'field'=>'code',
           'type'=>'text'
        ]        
      );
     $this->addColumn('inputType',
        [
           "lable"=>'InputType',
           'field'=>'inputType',
           'type'=>'text'
        ]        
      );
     $this->addColumn('backendType',
        [
           "lable"=>'BackendType',
           'field'=>'backendType',
           'type'=>'text'
        ]        
      );
       $this->addColumn('BackendModel',
        [
           "lable"=>'BackendTModel',
           'field'=>'backendModel',
           'type'=>'text'
        ]        
      );
     $this->addColumn('sortOrder',
        [
           "lable"=>'SortOrder',
           'field'=>'sortOrder',
           'type'=>'number'
        ]        
      );


  } 

  public function prepareActions()
  {
      $this->addAction('Edit',
        [
         'lable'=>'Edit',
         'method'=>'getEditUrl',
         'class'=>'class="btn btn-primary"'
        ]
     );

      $this->addAction('Delete',
        [
         'lable'=>'Delete',
         'method'=>'getDeleteUrl',
         'class'=>'class="btn btn-danger"'
        ]
     );
  }

  public function prepareButtons()
  {
     $this->addButton('AddAttribute',
      
      [
         'lable'=>'Add Attribute',
         'method'=>'getAddAtributeUrl',
         'class'=>'class="btn btn-primary"'
      ]
    );
  }

  public function getAddAtributeUrl()
  {
      return $this->getUrl('form');
  }

 public function getEditUrl($row)
  {
     return $this->getUrl('edit',null,['id'=>$row->attributeId ]);
  }
 public function getDeleteUrl($row)
  {
     return $this->getUrl('delete',null,['id'=>$row->attributeId ]);
  }
  
  }

?>
