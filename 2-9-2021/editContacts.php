<?php 

include "index.php";

$id=$_GET['id'];

if(isset($_POST['submit'])){

	$name=mysqli_real_escape_string($mycon,$_POST['name']);
	$email=mysqli_real_escape_string($mycon,$_POST['email']);
	$phone=mysqli_real_escape_string($mycon,$_POST['phone']);
	$title=mysqli_real_escape_string($mycon,$_POST['title']);

	$q="update contacts set name='$name',email='$email',phone='$phone',title='$title' where id=$id;";

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
		 	 
		 	 <?php 

		 	  $q1="select * from contacts where id=$id";
		 	  $result10=mysqli_query($mycon,$q1) or die("Edit query not running");

		 	 	if(mysqli_num_rows($result10)>0){

		 	 		$p=mysqli_fetch_assoc($result10);		 	 		

		 	 ?>
		 	<input type="text" name="name" value="<?php echo $p['name'] ;?>" placeholder="Name">
		 	<input type="text" name="email" value="<?php echo $p['email'] ;?>" placeholder="Email"><br><br><br>
		 	<input type="text" name="phone" value="<?php echo $p['phone']; ?>" placeholder="Phone">
		 	<input type="text" name="title" value="<?php echo $p['title']; ?>" placeholder="Title"><br><br><br>
		 	<input type="submit" name="submit" value="Update">

		 	<?php 

		 		}


		 	?>

		 </form>

	</div>


</body>
</html>

