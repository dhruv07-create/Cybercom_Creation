<?php
namespace Block\Core;
 \Mage::loadFileByClassName('Block\\Core\\Table');
 \Mage::loadFileByClassName('Model\\Admin');

 class Grid extends \Block\Core\Table {

     protected $collection='';
     protected $column=[];
     protected $action=[];
     protected $button=[];


   public function __construct(){

       $this->setTemplate('./View/core/grid.php');
       $this->prepareColumns();
       $this->prepareActions();
       $this->prepareButtons();
   }  

  public function getTitle()
  {
     return 'Enter Title';
  }
 
  public function prepareCollection()
  {
      return $this;    
  }

   public function setCollection(\Model\Core\Collection $collection)
   {
     
          $this->collection=$collection;
         return $this;

   }

   public function getCollection()
   {
          if(!$this->collection)
          {
            $this->prepareCollection();
          }

          return $this->collection;

   }

    public function getColumns()
    {
        return $this->column;
    }

    public function addColumn($key,$value)
    {
         $this->column[$key]=$value;

         return $this;
    }

    public function prepareColumns()
    {
       return $this;
    }

    public function getFieldValue($row,$field)
    {
      return $row->$field;
    }

   public function getActions()
   { 
      return $this->action;
   }

   public function addAction($key,$action)
   {
       $this->action[$key]=$action; return $this;
   }

   public function prepareActions()
   {
       return $this;
   }

   public function getMethodUrl($row,$method)
   {
      return $this->$method($row);
   }

  public function getButtons()
   { 
      return $this->button;
   }

   public function addButton($key,$button)
   {
       $this->button[$key]=$button; return $this;
   }

    public function prepareButtons()
   {
      return $this;
   }

   public function getButtonUrl($method)
   {
     return $this->$method();
   }
 
}

?>