<?php 

include "index.php";

session_start();

	if(!isset($_SESSION['login_user'])){
	    
	  header("Location: http://localhost/my/ABC/Testphp/login.php");
	 
  }

if(isset($_POST['submit'])){

	$name=mysqli_real_escape_string($mycon,$_POST['name']);
  
    $qu="select * from product1 where pname='".$name."' ;";
    $result100=mysqli_query($mycon,$qu);

       if(mysqli_num_rows($result100)>0)
       {
           echo '<script>alert("This item is already stored..");</script>';
       }else{

			$cid=number_format(mysqli_real_escape_string($mycon,$_POST['select']));


		//	$cid=impload(",",$cid);

			$q="INSERT INTO product1 VALUES(null,'$name');";

			$result=mysqli_query($mycon,$q) or die("Quer not running..");

			$q10="select * from product1 where pname='".$name."' ;";

			$result10=mysqli_query($mycon,$q10) or die("Quer not running..");

			$t=mysqli_fetch_assoc($result10);

			$pid=number_format($t['pid']);
		    
			$q23='insert into pc values('.$pid.','.$cid.');';

			mysqli_query($mycon,$q23) or die("Quer2 not running..");


		  
			header('Location: http://localhost/PhpTutorial/MysqlData/project2/product.php');

   }

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
       	 <li style="display: inline;"><a href="home.php"><BUTTON style="color: black;">Home</BUTTON></a></li>
       	 <li style="display: inline;"><a href="contacts.php"><BUTTON style="color: black;">Contacts</BUTTON></a></li>
       </ul>
  
	</div>

	<div style="height:520px;padding: 5px;"align="center">

		 <form style="margin-top: 10px;" action="createProduct.php" method="post">
		 	
		 	<input type="text" name="name" placeholder="Name"><br><br><br>
		 	
		 	<?php

		 	 $q1="select * from category;";
		 	 $result1=mysqli_query($mycon,$q1);

		 	 if(mysqli_num_rows($result1)>0){

		 	 	echo '<select name="select">';

		 	 	  while($r=mysqli_fetch_assoc($result1)){

		 	?>
		 	
		 	 <option value="<?php echo $r['cid'] ; ?>" ><?php echo $r['cname'] ; ?></option>

		 	  
		 	  <!--  <input type="checkbox" name="select[]" value="<?php echo $r['cid'] ; ?>">
		 	    <?php echo $r['cname'] ; ?><br>
 -->

		 	 <?php 
                   
                   }
              echo '</select>';
		     	}

		 	 ?>
		 	 	<br><br><br>
		 	<input type="submit" name="submit" value="done">

		 </form>

	</div>


</body>
</html>