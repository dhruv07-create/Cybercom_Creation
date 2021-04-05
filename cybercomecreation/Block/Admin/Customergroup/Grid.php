<?php
namespace Block\Admin\Customergroup;

\Mage::loadFileByClassName("Block\Core\Grid");

  class Grid extends \Block\Core\Grid
  {

    public function getTitle()
    {  return 'Customergroup';

    }

   public function prepareCollection()
    {
             $customergroup=\Mage::getModel('Model\customergroup');
     $q="SELECT * FROM {$customergroup->getTableName()}";
      
       if($this->getFilter()->hasFilter())
       {
         $q.=" where 1=1";
         foreach ($this->getFilter()->getFilters() as $type => $filter)
         {
             if($type=='text')
             {
                foreach ($filter as $key => $value){
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
           $pager->setTotalRecords($customergroup->getAdapter()->fetchOne($q));
           $pager->setRecordsPerPage(2);
           $pager->calculate();
           $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";  
            //  session_destroy();
         $this->setCollection($customergroup->fetchAll($q));
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
      $this->addColumn('goupId',
         
         [ 
          'lable'=>'Group Id',
          'field'=>'groupId'
          ,'type'=>'number'
         ]
      );

      $this->addColumn('name',
         
         [ 
          'lable'=>'Name',
          'field'=>'name',
          'type'=>'varchar'
         ]
      );

      $this->addColumn('createddate',
        
         [
          'lable'=>'CreatedDate',
          'field'=>'createddate',
          'type'=>'varchar'
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
            'lable'=>'AddCustomerGroup',
            'class'=>"class='btn btn-primary'",
            'method'=>'getAddBrandURl'
          ]
        );
    }
    

    public function getEditURl($row)
    {
       return $this->getUrl('edit',null,['id'=>$row->groupId]);
    }

    public function getDeleteURl($row)
      {
         return $this->getUrl('delete',null,['id'=>$row->groupId]); 
      }

    public function getAddBrandURl()
    {
       return $this->getUrl('form');
    }       
  }

?>