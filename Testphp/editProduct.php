<?php 

include "index.php";

 session_start();

 if(!isset($_SESSION['login_user'])){
    
  header("Location: http://localhost/my/ABC/Testphp/login.php");
 
 }

$id=$_GET["id"];


if(isset($_POST['submit'])){

	$name=mysqli_real_escape_string($mycon,$_POST['name']);

	$q="update product1 set pname='$name' where pid=$id;";

	$result=mysqli_query($mycon,$q) or die("Quer not running..");

	header('Location: http://localhost/PhpTutorial/MysqlData/project2/product.php');


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
       </ul>
  
	</div>

	<div style="height:520px;padding: 5px;"align="center">

		 <form style="margin-top: 10px;" action="editProduct.php?id=<?php echo $id; ?>" method="post">
		 	 
		 	 <?php 

		 	  $q1="select * from product1 where pid=$id";
		 	  $result10=mysqli_query($mycon,$q1) or die("Edit query not running");

		 	 	if(mysqli_num_rows($result10)>0){

		 	 		$p=mysqli_fetch_assoc($result10);		 	 		

		 	 ?>
		 	<input type="text" name="id" value="<?php echo $p['pid'] ;?>" placeholder="id" readonly style="background-color: pink;">
		 	<input type="text" name="name" value="<?php echo $p['pname'] ;?>" placeholder="Name">
		
		 	<input type="submit" name="submit" value="Update">

		 	<?php 

		 		}


		 	?>

		 </form>

	</div>


</body>
</html>

