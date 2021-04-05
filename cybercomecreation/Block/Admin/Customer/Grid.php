<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName("Block\Core\Grid");

  class Grid extends \Block\Core\Grid
  {

    public function getTitle()
    {  return 'Customer';

    }


    public function prepareCollection()
    {
       $customer=\Mage::getModel('Model\Customer');
     $q="SELECT c.customerId ,c.firstname,ca.address,c.lastname,c.email,c.password,cg.name,c.status,c.createddate,c.updateddate 
           from customer c join customer_group cg on c.groupId=cg.groupId join customer_address ca on c.customerId =ca.customerId 
           where ca.addresstype='billing'";
      
       if($this->getFilter()->hasFilter())
       {
         $q.=" AND 1=1";
         foreach ($this->getFilter()->getFilters() as $type => $filter)
         {
             if($type=='text')
             {
                foreach ($filter as $key => $value){
                   if('createddate'==$key){  $key='c.createddate' ; }
                    $q .=" AND {$key} LIKE '%{$value}%' ";     
                }
             }
             if($type=='number')
             {
                foreach ($filter as $key => $value) 
                {  if($key=='status') { $value= array_search($value,$customer->getStatusOption());}
                   if('customerId'==$key){  $key='c.customerId' ; }
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
       $pager->setTotalRecords($customer->getAdapter()->fetchOne($q));
       $pager->setRecordsPerPage(2);
       $pager->calculate();
       $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";
            //  session_destroy();
         $this->setCollection($customer->fetchAll($q));
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
      $this->addColumn('customerId',
         
         [ 
          'lable'=>'Customer Id',
          'field'=>'customerId'
          ,'type'=>'number'
         ]
      );

      $this->addColumn('FirstName',
         
         [ 
          'lable'=>'FirstName',
          'field'=>'firstname',
          'type'=>'text'
         ]
      );

      $this->addColumn('LastName',
         
         [ 
          'lable'=>'LastName',
          'field'=>'lastname'
          ,'type'=>'text'
         ]
      );

      $this->addColumn('email',

        [
          'lable'=>'Email',
          'field'=>'email',
          'type'=>'text'
        ]
      );
      $this->addColumn('password',
        
         [
          'lable'=>'Password',
          'field'=>'password',
          'type'=>'text'
         ]
      );

  $this->addColumn('groupname',
        
         [
          'lable'=>'Groupname',
          'field'=>'name',
          'type'=>'text'
         ]
      );
      $this->addColumn('Address',
        
         [
          'lable'=>'Address',
          'field'=>'address',
          'type'=>'text'
         ]
      ); 

        $this->addColumn('status',
         
         [ 
          'lable'=>'Status',
          'field'=>'status',
          'type'=>'number'
         ]
      ); $this->addColumn('createddate',
        
         [
          'lable'=>'CreatedDate',
          'field'=>'createddate',
          'type'=>'text'
         ]
      );  $this->addColumn('updateddate',
        
         [
          'lable'=>'UpdatedDate',
          'field'=>'updateddate',
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
    public function prepareButtons()
    {
        $this->addButton('Add'
          ,
          [
            'lable'=>'AddCustomer',
            'class'=>"class='btn btn-primary'",
            'method'=>'getAddCustomerURl'
          ]
        );
    }
    

    public function getEditURl($row)
    {
       return $this->getUrl('edit',null,['id'=>$row->customerId,'t'=>'u']);
    }

    public function getFieldValue($row,$fild)
    {   
       if($fild == 'status')
       { $statusOp=\Mage::getModel('Model\customer')->getStatusOption();
         return $statusOp[$row->$fild];
       }

       return $row->$fild;
    }

    public function getDeleteURl($row)
      {
         return $this->getUrl('delete',null,['id'=>$row->customerId]); 
      }

    public function getAddCustomerURl()
    {
       return $this->getUrl('form',null,['t'=>'a']);
    }       

}
 
?>
