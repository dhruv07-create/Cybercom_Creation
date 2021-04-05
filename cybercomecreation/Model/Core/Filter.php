<?php
namespace Model\Core;

 class Filter extends Session
 {	 
 	public function __construct()
 	{
       parent::__construct();
       $this->setNameSpace('Filter');
 	}

 	public function setFilter($filter)
 	{ 
 		 if(!$filter)
 		 {
            return false;
 		 }
 		 $filter= array_filter(array_map(function($value){
      
          $value=array_filter($value);
          return $value;

 		 },$filter));
      $k=$_GET['c'];
 		 $this->$k=$filter;
     return $this;

 	}

 	public function hasFilter()
 	{$k=$_GET['c'];
 		if(!$this->$k)
 		{
 	      return false;	 
 		}
    return true;		
 	}

 	public function getFilters()
 	{ $k=$_GET['c'];
 		return $this->$k;
 	}

 	public function getFilterValue($type,$key)
 	{
    $k=$_GET['c'];
 		if($this->$k)
 		{
         if(!array_key_exists($type,$this->$k))
          {
          	return null;
          }

         if(!array_key_exists($key,$this->$k[$type]))
         {
         	return null;
         } 
    
         return $this->$k[$type][$key];
     }
 	}
 } 


?>