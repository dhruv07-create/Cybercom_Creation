<?php

  var_dump($this->getChildren()); 
      if($this->getChildren()){

    
      foreach ($this->getChildren() as $key => $value) {
             echo $value->toHtml(); 
      }

  }

?>
