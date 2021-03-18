<?php
namespace Model\Core;

 class Request{

    public function getPost($key=null,$ren=null)
    {

         if(!$key)
         {

          return $_POST;

         }

         if(array_key_exists($key, $_POST))
         {

         	return $_POST[$key];

         }

         return $ren;


    }

    public function isPost()
    {

    	if($_SERVER['REQUEST_METHOD']=='POST')
        {
      
             return true;

    	}

    	return false;


    }

     public function getGet($key=null,$va=null)
     {

        if(!$key)
        {

        	return $_GET;

        }

        if(array_key_exists($key,$_GET))
        {

        	return $_GET[$key];
        }

        return $va;

    }
   
     public function getActionName()
     {
    
       return $this->getGet('a');
  
     }

     public function getControllerName()
     {

     return $this->getGet('c');

     }

 }

?>