<?php
namespace Model\Core;
\Mage::getFileByClassName("Model\\Core\\Session");

  class Message extends Session 
  {
  		public function setSuccess($success)
  		{
  			$this->success=$success;
  		}
       
       public function getSuccess()
       {
       	   return $this->success;
       }

       public function setFailer($success)
  		{
  			$this->success=$failer;
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