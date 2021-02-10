<?php
   
    
   session_start();
   
   if(session_destroy()) {
	   
      header("Location: http://localhost/my/ABC/Testphp/login.php");
   }
?>