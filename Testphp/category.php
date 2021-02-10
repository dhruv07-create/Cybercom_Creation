<?php

 include 'index.php';

 session_start();

 if(!isset($_SESSION['login_user'])){
    
  header("Location: http://localhost/my/ABC/Testphp/login.php");
 
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<div style="background-color: blue;padding: 5px">
	
	     <h3 style="color: white;">Web site</h3>

       <ul style="list-style-type: none; margin-left: 50%;">
       	 <li style="display: inline;"><a href="product.php"><BUTTON style="color: black;">Product</BUTTON></a></li>

       	 <li style="display: inline;"><a href="category.php"><BUTTON style="color: black;">Category</BUTTON></a></li>

       	 <li style="display: inline;"><a href="home.php"><BUTTON style="color: black;">
       	 Home</BUTTON></a></li>

       	 <li style="display: inline;"><a href="logout.php"><BUTTON style="color: black;">logout</BUTTON></a></li>
       </ul>
  
	</div>

	<div style="height:520px;padding: 5px;" align="center">
		
		

	</div>


</body>
</html>