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
		
		<table border="1"> 


			<tr>
				<th>Product</th>
				<th>Category</th>
			</tr>

           
           <?php


           $q='select * from product1;';

           $result=mysqli_query($mycon,$q) or exit('Query is not running 1..') ;

           if(mysqli_num_rows($result)>0){

           	  while($use=mysqli_fetch_assoc($result)){

           	  		$q1="select * from pc where pid=".$use['pid'];

           	  		 $result1=mysqli_query($mycon,$q1) or exit('Query is not running 2..') ;

			           if(mysqli_num_rows($result1)>0){

			           	  while($use1=mysqli_fetch_assoc($result1)){

			           	  	 $q2='select cname from category where cid='.$use1["cid"];

			           	  	   $result2=mysqli_query($mycon,$q2) or exit('Query is not running 3..') ;

							           if(mysqli_num_rows($result2)>0){

							           	  while($use2=mysqli_fetch_assoc($result2)){

           ?>
 

 						<tr>
							<td><?php echo $use['pname'] ; ?></td>
							<td><?php echo $use2['cname'] ; ?></td>
			            </tr>

          <?php

			          			}
			          		}
			          	}

			          }
			      }
			  }



          ?>
		           

		</table>

	</div>


</body>
</html>