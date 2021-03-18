<?php
namespace Model\Customer;

\Mage::loadFileByClassName('Model\\Customer\\Session');

 class Message extends Session 
 {

     public function __construct()
     {
     	parent::__construct();
     } 	
          public function setSuccess($success)
  		{
  			$this->success=$success;
  		}
       
       public function getSuccess()
       {
       	   return $this->success;
       }

       public function setFailer($failer)
  		{
  			$this->failer=$failer;
  		}
       
       public function getFailer()
       {
       	   return $this->failer;
       }

       public function clearSuccess()
       {    

       	        unset($this->success);
       }

       public function clearFailer()
       {
       	  unset($this->failer);
       }
 }

?>