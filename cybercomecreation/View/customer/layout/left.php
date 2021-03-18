<?php

     if($this->getChildren())
     {
     	 foreach ($this->getChildren() as $key => $value) {
 	 	     
 	 	   echo  $value->toHtml();		
     	 }
     }
  
?>

