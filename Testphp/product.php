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
       	 <li style="display: inline;"><a href="home.php"><BUTTON style="color: black;">Home</BUTTON></a></li>
       </ul>
  
	</div>

	<div style="height:520px;padding: 5px;" align="center">
		
    <a href="createProduct.php"><button>Create</button></a>

		<table border="1"> 


			<tr>
				<th>Product</th>
				<th>Ok</th>
			</tr>

          <?php


             $q='select * from product1';
             $result=mysqli_query($mycon,$q) or die("Sql error");

             if(mysqli_num_rows($result)>0){

             	   while($t=mysqli_fetch_assoc($result)){

          ?>
         
			<tr>
				<td><?php echo $t['pname'] ; ?></td>
				<td>
					
					<a href="editProduct.php?id=<?php echo $t['pid'] ;?>"><button style="background-color: blue;color: white;">Edit </button></a>
					<a href="deleteProduct.php?id=<?php echo $t['pid'] ;?>"><button style="background-color: red;color:white;"> Delete</button></a> 

				</td>
			</tr>
          
 			<?php

 		       }

 		      }

 			?>

		</table>

	</div>


</body>
</html>