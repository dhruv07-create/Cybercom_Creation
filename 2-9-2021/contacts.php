<?php 

include "index.php";

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


	 <a href="create.php" style="float: left;"><button>Create</button></a>
		
		<table cellspacing="0" border="1" style="margin-top: 58px;width: 700px;">

		  <tr>
			<th>id</th>
			<th>name</th>
			<th>email</th>
			<th>phone</th>
			<th>title</th>
			<th>Do</th>

			</tr>

           <?php 

 			$q="SELECT * FROM contacts";

 			$result=mysqli_query($mycon,$q) or exit("query is not working..");

            if(mysqli_num_rows($result)>0){

            	 while($wi=mysqli_fetch_assoc($result)){

           ?>
         
         		<tr>

         			<td><?php echo $wi['id'] ?></td>
					<td><?php echo $wi['name'] ?></td>
					<td><?php echo $wi['email'] ?></td>
					<td><?php echo $wi['phone'] ?></td>
					<td><?php echo $wi['title'] ?></td>
					<td align="center">
						

						<a href="editContacts.php?id=<?php echo $wi['id'] ;?>"><button style="background-color: blue;color: white;">Edit </button></a>
						<a href="deleteContacts.php?id=<?php echo $wi['id'] ;?>"><button style="background-color: red;color:white;"> Delete</button></a> 

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



