<?php
namespace Model\Customer;
\Mage::loadFileByClassName('Model\Core\Session');

 class FilterFront extends Session
 {	 
 	public function __construct()
 	{
       parent::__construct();
 	}

 	public function setFilter($filter)
 	{             
      $k='filter';
 		 if(!$filter)
 		 {
      unset($_SESSION['Customer']["{$k}"]);
            return false;
 		 }
       
     if(!isset($filter['category']))
     { 
       if(array_key_exists('category',$_SESSION['Customer']["{$k}"]))
       unset($_SESSION['Customer']["{$k}"]['category']);
     }

     if(!isset($filter['attribute']))
     { 
       if(array_key_exists('attribute',$_SESSION['Customer']["{$k}"]))
       unset($_SESSION['Customer']["{$k}"]['attribute']);
     }


 		 $filter= array_filter($filter);
 		 $this->$k=$filter;

     return $this;

 	}

 	public function hasFilter()
 	{$k='filter';
 		if(!$this->$k)
 		{
 	      return false;	 
 		}
    return true;		
 	}

 	public function getFilters()
 	{ $k='filter';
 		return $this->$k;
 	}

 	public function getFilterValue($type,$key,$key0=null)
 	{$k="filter";
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

         if($key0)
         {
           if(!array_key_exists($key0,$this->$k[$type][$key]))
           {
            return null;
           } 
          return $this->$k[$type][$key][$key0];                     
         }
    
         return $this->$k[$type][$key];
     }
 	}
 } 


?>