<?php
namespace Block\Admin\Admin;
 \Mage::loadFileByClassName('Block\\Core\\Grid');

 class Grid extends \Block\Core\Grid {          

  protected $pager=null;
  public function getTitle()
  {
     return 'Admin';
  }
 
  public function prepareCollection()
  {

    $admin=\Mage::getModel('Model\Admin');
    $q="SELECT * FROM {$admin->getTableName()}";
      
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
                {if($key== 'status') { $value=array_search($value,$admin->getstatusOption()); }
                    $q .=" AND {$key}={$value} ";     
                }      
             }
         }    
       }
         
        // session_destroy();  
       $pager=$this->getPager();
       $pager->setTotalRecords($admin->getAdapter()->fetchOne($q));
       $pager->setRecordsPerPage(2);
       $pager->calculate();
       $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());
     
      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";
                
// session_destroy();

     $this->setCollection($admin->fetchAll($q));

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

    public function prepareColumns()
    {
        $this->addColumn('userId',
          [
            'field'=>'userId',
            'lable'=>'user Id',
            'type'=>'number'
          ]
         );

        $this->addColumn('name',
          [
            'field'=>'name',
            'lable'=>'Name',
            'type'=>'text'
          ]
         );

        $this->addColumn('Password',
          [
            'field'=>'password',
            'lable'=>'Password',
            'type'=>'text'
          ]
         );


        $this->addColumn('status',
          [
            'field'=>'status',
            'lable'=>'Status',
            'type'=>'number'
          ]
         );                 

        $this->addColumn('createdDate',
          [
            'field'=>'createddate',
            'lable'=>'createdDate',
            'type'=>'text'
          ]
         );
    }

    public function getFieldValue($row,$column)
    {
        if($column=='status')
        {
          
          return \Mage::getModel('Model\Admin')->getStatusOption()[$row->status];
        }
       
       return $row->$column; 
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
            'method'=>'getEditUrl',
            'class'=>'class="btn btn-success"',
            'ajex'=>false
          ]   
       );

       $this->addAction('delete',
          [
            'lable'=>'Delete',
            'method'=>'getDeleteUrl' ,
            'class'=>'class="btn btn-danger"',
            'ajex'=>false

          ]
      );
   }

   public function getDeleteUrl($row)
   {
       return $this->getUrl('delete',null,['id'=>$row->userId]);
     //  return "object.setUrl('{$url}').load();";
   }

    public function getEditUrl($row)
   {
       return $this->getUrl('edit',null,['id'=>$row->userId]);
      // return "object.setUrl('{$url}').load();";
   }

    public function prepareButtons()
   {
       $this->addButton('AddNew',
          [
            'lable'=>'AddAdmin',
            'method'=>'getNewAdminUrl',
            'class'=>'class="btn btn-success"'
          ]   
       );

   }

   public function getNewAdminUrl()
   {
         return $this->getUrl('form');
   }
      
}

?>