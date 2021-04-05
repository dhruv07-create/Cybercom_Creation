<?php
namespace Block\Admin\Cms;
 \Mage::loadFileByClassName('Block\\Core\\Grid');

 class Grid extends \Block\Core\Grid {


  public function getTitle()
  {
     return 'Cms';
  }
 
  public function prepareCollection()
  {
           $cms=\Mage::getModel('Model\cms');
     $q="SELECT * FROM {$cms->getTableName()}";
      
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
       $pager->setTotalRecords($cms->getAdapter()->fetchOne($q));
       $pager->setRecordsPerPage(2);
       $pager->calculate();
       $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";
         $this->setCollection($cms->fetchAll($q));
  }


    public function prepareColumns()
    {
        $this->addColumn('PageId',
          [
            'lable'=>'Page Id',
            'field'=>'pageId',
            'type'=>'number'
          ]
         );

        $this->addColumn('TiTle',
          [
            'field'=>'title',
            'lable'=>'Title',
            'type'=>'text'
          ]
         );

        $this->addColumn('identifier',
          [
            'field'=>'identifier',
            'lable'=>'Identifier',
            'type'=>'text'
          ]
         );


        $this->addColumn('content',
          [
            'lable'=>'content',
            'field'=>'content',
            'type'=>'text'
          ]
         );                 

         $this->addColumn('status',
          [
            'lable'=>'Status',
            'field'=>'status',
            'type'=>'text'
          ]
         );
 		       	
        $this->addColumn('createdDate',
          [
            'lable'=>'createdDate',
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
            'method'=>'getEditUrl',
            'class'=>'class="btn btn-success"'
          ]   
       );

       $this->addAction('delete',
          [
            'lable'=>'Delete',
            'method'=>'getDeleteUrl' ,
            'class'=>'class="btn btn-danger"'
          ]
      );
   }
   public function getFilter()
   {
       return \Mage::getModel('Model\Core\Filter');   
   }
   public function getDeleteUrl($row)
   {
       return $this->getUrl('delete',null,['id'=>$row->pageId]);
   }

    public function getEditUrl($row)
   {
       return $this->getUrl('edit',null,['id'=>$row->pageId]);
   }

    public function prepareButtons()
   {
       $this->addButton('AddNew',
          [
            'lable'=>'AddCms',
            'method'=>'getNewCmsUrl',
            'class'=>'class="btn btn-primary"'
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
   public function getNewCmsUrl()
   {
         return $this->getUrl('form');
   }
      
}

?>