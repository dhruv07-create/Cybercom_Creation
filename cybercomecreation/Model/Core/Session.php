<?php
namespace Model\Core;
 class Session 
 {

 	protected $nameSpace='core';

 	public function __construct()
 	{
 		$this->start();
 	}

 	public function start()
 	{ 
         if(session_status() == PHP_SESSION_NONE)
         {
 	      	session_start();	
         }
 		return $this;	
 	}

 	public function setNameSpace($name)
 	{
 		$this->nameSpace=$name;
 		return $this;
 	}

 	public function getNameSpace()
 	{
 		return $this->nameSpace;
 	}

    public function getId()
    {
    	return session_id();
    }

    public function destroy()
    {
    	session_destroy();
          return $this;	
    }
 
   public function regeneratedId()
   {
   	    return session_regenerate_id();
   }

   public function __unset($key)
   {
     if(array_key_exists($this->getNameSpace(),$_SESSION))
     {
        if(array_key_exists($key, $_SESSION[$this->getNameSpace()]))
        {
   	   unset($_SESSION[$this->getNameSpace()][$key]);
        }
      }  
   }

   public function __set($key,$value)
   {
   	   $_SESSION[$this->getNameSpace()][$key]=$value;

   	   return $this;
   }

   public function __get($key)
   {       
     if(array_key_exists($this->getNameSpace(),$_SESSION))
     {
   	   if(array_key_exists($key, $_SESSION[$this->getNameSpace()]))
       {
               
           return $_SESSION[$this->getNameSpace()][$key];
   	   }
     }  

   	  return null;
   }
 }

?>