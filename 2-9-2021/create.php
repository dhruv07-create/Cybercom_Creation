<?php 

include "index.php";

if(isset($_POST['submit'])){

	$name=mysqli_real_escape_string($mycon,$_POST['name']);
	$email=mysqli_real_escape_string($mycon,$_POST['email']);
	$phone=mysqli_real_escape_string($mycon,$_POST['phone']);
	$title=mysqli_real_escape_string($mycon,$_POST['title']);

	$q="INSERT INTO contacts VALUES(null,'$name','$email','$phone','$title');";

	$result=mysqli_query($mycon,$q) or die("Quer not running..");

  
	header('Location: http://localhost/PhpTutorial/MysqlData/contacts.php');

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

       <ul style="list-style-type: none; margin-left: 80%;">
       	 <li style="display: inline;"><a href="header.php"><BUTTON style="color: black;">Home</BUTTON></a></li>
       	 <li style="display: inline;"><a href="contacts.php"><BUTTON style="color: black;">Contacts</BUTTON></a></li>
       </ul>
  
	</div>

	<div style="height:520px;padding: 5px;"align="center">

		 <form style="margin-top: 10px;" action="create.php" method="post">
		 	
		 	<input type="text" name="name" placeholder="Name">
		 	<input type="text" name="email" placeholder="Email"><br><br><br>
		 	<input type="text" name="phone" placeholder="Phone">
		 	<input type="text" name="title" placeholder="Title"><br><br><br>
		 	<input type="submit" name="submit" value="done">

		 </form>

	</div>


</body>
</html>