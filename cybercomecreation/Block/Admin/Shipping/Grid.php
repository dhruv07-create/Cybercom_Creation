<?php
namespace Block\Admin\Shipping;

\Mage::loadFileByClassName("Block\Core\Grid");

  class Grid extends \Block\Core\Grid
  {

    public function getTitle()
    {  return 'Shipping';

    }

  public function prepareCollection()
    {
       $shipping=\Mage::getModel('Model\shipping');
       $q="SELECT * FROM {$shipping->getTableName()}";
      
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
                {if($key=='status'){ $value=array_search($value,$shipping->getStatusOption()); }  
                    $q .=" AND {$key}={$value} ";     
                }      
             }
         }    
       }
      
           $pager=$this->getPager();
           $pager->setTotalRecords($shipping->getAdapter()->fetchOne($q));
           $pager->setRecordsPerPage(2);
           $pager->calculate();
           $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";  
     $this->setCollection($shipping->fetchAll($q));
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
      $this->addColumn('methodId',
         
         [ 
          'lable'=>'MethodId',
          'field'=>'methodId'
          ,'type'=>'number'
         ]
      );

      $this->addColumn('code',
         
         [ 
          'lable'=>'Code',
          'field'=>'code',
          'type'=>'text'
         ]
      ); $this->addColumn('name',
         
         [ 
          'lable'=>'Name',
          'field'=>'name',
          'type'=>'text'
         ]
      ); $this->addColumn('amount',
         
         [ 
          'field'=>'amount',
          'lable'=>'amount',
          'type'=>'number'
         ]
      ); $this->addColumn('description',
         
         [ 
          'lable'=>'Description',
          'field'=>'description',
          'type'=>'text'
         ]
      );

      $this->addColumn('status',
         
         
         [ 
          'lable'=>'Status',
          'field'=>'status',
          'type'=>'number'
         ]
      );

      $this->addColumn('createddate',
         
         [ 
          'lable'=>'CreatedDate',
          'field'=>'createddate'
          ,'type'=>'text'
         ]
      );
      $this->addColumn('Updateddate',
        
         [
          'lable'=>'Updateddate',
          'field'=>'updateddate',
          'type'=>'text'
         ]
      );
   }
      public function getFilter()
      {
         return \Mage::getModel('Model\Core\Filter');
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

    public function prepareButtons()
    {
        $this->addButton('Add'
          ,
          [
            'lable'=>'AddShipping',
            'class'=>"class='btn btn-primary'",
            'method'=>'getAddShippingURl'
          ]
        );
    }
    
    public function getFieldValue($row,$fild)
    {
      if($fild=='status')
      {$op=\Mage::getModel('Model\shipping')->getStatusOption();
        return $op[$row->$fild];
      }

      return $row->$fild;
    }

    public function getEditURl($row)
    {
       return $this->getUrl('edit',null,['id'=>$row->methodId]);
    }

    public function getDeleteURl($row)
      {
         return $this->getUrl('delete',null,['id'=>$row->methodId]); 
      }

    public function getAddShippingURl()
    {
       return $this->getUrl('form');
    }       
  }

?>