<?php
namespace Block\Admin\Brand;

\Mage::loadFileByClassName("Block\Core\Grid");

  class Grid extends \Block\Core\Grid
  {

    public function getTitle()
    {  return 'Brand';

    }

   public function prepareCollection()
    {
       $brand=\Mage::getModel('Model\Brand');
    $q="SELECT * FROM {$brand->getTableName()}";
      
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
       $pager->setTotalRecords($brand->getAdapter()->fetchOne($q));
       $pager->setRecordsPerPage(2);
       $pager->calculate();
       $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";

     $this->setCollection($brand->fetchAll($q));
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
      $this->addColumn('brandId',
         
         [ 
          'lable'=>'BrandId',
          'field'=>'brandId'
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

      $this->addColumn('image',
         
         [ 
          'lable'=>'Image',
          'field'=>'image'
          ,'type'=>'image'
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

      public function getFilter()
      {
           return \Mage::getModel('Model\Core\Filter');      
      }
    public function prepareButtons()
    {
        $this->addButton('Add'
          ,
          [
            'lable'=>'AddBrand',
            'class'=>"class='btn btn-primary'",
            'method'=>'getAddBrandURl'
          ]
        );
    }
  	

    public function getEditURl($row)
    {
       return $this->getUrl('edit',null,['id'=>$row->brandId]);
    }

    public function getDeleteURl($row)
      {
         return $this->getUrl('delete',null,['id'=>$row->brandId]); 
      }

    public function getAddBrandURl()
    {
       return $this->getUrl('form');
    }       
  }

?>