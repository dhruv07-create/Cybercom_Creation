<?php
namespace Block\Admin\Payment;

\Mage::loadFileByClassName("Block\Core\Grid");

  class Grid extends \Block\Core\Grid
  {

    public function getTitle()
    {  return 'Payment';

    }

   public function prepareCollection()
    {
       $payment=\Mage::getModel('Model\payment');
       $q="SELECT * FROM {$payment->getTableName()}";
      
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
                {  if($key=='status') { $value=array_search($value,$payment->getStatusOption()); }
                    $q .=" AND {$key}={$value} ";     
                }      
             }
         }    
       }
           $pager=$this->getPager();
           $pager->setTotalRecords($payment->getAdapter()->fetchOne($q));
           $pager->setRecordsPerPage(2);
           $pager->calculate();
           $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";      

     $this->setCollection($payment->fetchAll($q));
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

      $this->addColumn('name',
         
         [ 
          'lable'=>'Name',
          'field'=>'name',
          'type'=>'varchar'
         ]
      );


      $this->addColumn('code',[
           'lable'=>'Code',
           'field'=>'code',
           'type'=>'varchar' 
      ]); 
      $this->addColumn('Status',[
            'lable'=>'Status',
            'field'=>'status',
            'type'=>'number'
      ]);
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
 public function setPager($pager)
 {
     $this->pager=$pager;
     return $this;
 }

 public function getPager()
 {
    return $this->pager;
 } 

    public function prepareButtons()
    {
        $this->addButton('Add'
          ,
          [
            'lable'=>'AddPayment',
            'class'=>"class='btn btn-primary'",
            'method'=>'getAddPaymentURl'
          ]
        );
    }
    public function getEditURl($row)
    {
       return $this->getUrl('edit',null,['id'=>$row->methodId]);
    }

    public function getDeleteURl($row)
      {
         return $this->getUrl('delete',null,['id'=>$row->methodId]); 
      }
       
    public function getFieldValue($row,$fild)
    {
       if($fild=='status')
       { $op= \Mage::getModel("Model\payment")->getStatusOption() ; 
         return $op[$row->$fild];
       } 

      return $row->$fild; 
    }  
    public function getAddPaymentURl()
    {
       return $this->getUrl('form');
    }      
  }

?>