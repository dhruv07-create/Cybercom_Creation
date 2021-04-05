<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName("Block\Core\Grid");

  class Grid extends \Block\Core\Grid
  {

    public function getTitle()
    {  return 'Product';

    }

   public function prepareCollection()
    {
       $product=\Mage::getModel('Model\product');
       $q="SELECT * FROM {$product->getTableName()}";
      
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
                {  if($key=='status') { $value=array_search($value,$product->getStatusOption()); }
                    $q .=" AND {$key}={$value} ";     
                }      
             }
         }    
       }

           $pager=$this->getPager();
           $pager->setTotalRecords($product->getAdapter()->fetchOne($q));
           $pager->setRecordsPerPage(2);
           $pager->calculate();
           $offset=($pager->getCurrentPage()-1)*($pager->getRecordsPerPage());

      $q.=" LIMIT {$offset},{$pager->getRecordsPerPage()} ";  

     $this->setCollection($product->fetchAll($q));
       
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
      $this->addColumn('productId',
         
         [ 
          'lable'=>'ProductId',
          'field'=>'productId'
          ,'type'=>'number'
         ]
      );

      $this->addColumn('sku',
         
         [ 
          'lable'=>'Sku',
          'field'=>'sku',
          'type'=>'text'
         ]
      ); $this->addColumn('name',
         
         [ 
          'lable'=>'Name',
          'field'=>'name',
          'type'=>'text'
         ]
      ); $this->addColumn('price',
         
         [ 
          'lable'=>'Price',
          'field'=>'price',
          'type'=>'number'
         ]
      ); $this->addColumn('Discount',
         
         [ 
          'lable'=>'Discount',
          'field'=>'discount',
          'type'=>'text'
         ]
      ); $this->addColumn('Quantity',
         
         [ 
          'lable'=>'Quantity',
          'field'=>'quantity',
          'type'=>'number'
         ]
      );$this->addColumn('DealProduct',
         
         [ 
          'lable'=>'DealProduct',
          'field'=>'dealItem',
          'type'=>'text'
         ]
      );$this->addColumn('MostPopular',
         
         [ 
          'lable'=>'MostPopular',
          'field'=>'mostPopular',
          'type'=>'text'
         ]
      ); 
      $this->addColumn('description',
         
         [ 
          'lable'=>'Description',
          'field'=>'description',
          'type'=>'text'
         ]
      ); $this->addColumn('status',
         
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
         return $model=\Mage::getModel('Model\Core\Filter');
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

       $this->addAction('Add to Cart',
          [
             'lable'=>'AddToCart',
             'class'=>'class="btn btn-primary"',
             'method'=>'getAddCartURl' 
          ]
      );
    } 

    public function prepareButtons()
    {
        $this->addButton('Add'
          ,
          [
            'lable'=>'AddProduct',
            'class'=>"class='btn btn-primary'",
            'method'=>'getAddProductURl'
          ]
        );
    }
    
    public function getFieldValue($row,$fild)
    {
      if($fild=='status')
      {$op=\Mage::getModel('Model\Product')->getStatusOption();
        return $op[$row->$fild];
      }

      return $row->$fild;
    }

    public function getEditURl($row)
    {
       return $this->getUrl('edit',null,['id'=>$row->productId]);
    }

    public function getDeleteURl($row)
      {
         return $this->getUrl('delete',null,['id'=>$row->productId]); 
      }

    public function getAddProductURl()
    {
       return $this->getUrl('form');
    }   

    public function getAddCartUrl($row)
    {
        return $this->getUrl('addToCart','admin\cart',['productId'=>$row->productId],true);  
    }     
  }

?>