<?php
include 'index.php';

session_start();

if(isset($_SESSION['login_user'])){
    
  header("Location: http://localhost/my/ABC/Testphp/home.php");
 
 }


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<div style="width:500px;height:430px;border:1px solid #000;margin:auto;margin-top:130px">
	
<form style="margin-top: 50px;margin-left: 70px;" action="login.php"  id="form" method="post" >
	
	<label for="name"><strong>Email:</strong></label><br>
	<input type="text" name="email" id="email" style="width: 330px;height: 30px;margin-top: 20px"><br><br><br>
	<label for="Password"><strong>Password:</strong></label><br>
	<input type="Password" name="password" id="password" style="width: 330px;height: 30px;margin-top: 20px"><br><br><br><br>


	<input type="submit" name="login" id="login" style="width: 338px;border:0px;background-color: #4d79ff;height: 30px" value="LOGIN" ><br>
    <p style="margin-left: 160px">or</p>
 	
</form>



<form action="registration.php" method="post">
	
	<input type="submit" name="REGISTER" style="width: 338px;background-color: #4d79ff;border:0px;height: 30px;margin-left: 70px;" value="REGISTER">
	

</form>

</div>

</body>
</html>
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   
   if(isset($_POST['login'])){
	

      $myemail = mysqli_real_escape_string($mycon,$_POST['email']);
	  
      $mypassword = mysqli_real_escape_string($mycon,$_POST['password']); 

      if(!$myemail=='' && !$mypassword=='' ){
      
      $sql = "select * from user where email = '".$myemail."' and password = '".$mypassword."'";
      $result = mysqli_query($mycon,$sql) or exit("quary not run");
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	 
      $active = $row['id'];
      
      $count = mysqli_num_rows($result);
      
    
      if($count == 1) {
         if(!isset($_SESSION['login_user'])){
			 $_SESSION['login_user']="$myemail";
		 }
		 /*else{
			 $myusername=$_SESSION['login_user'];
		 }*/
		 header("Location: http://localhost/my/ABC/Testphp/home.php?id=$active");
      }else{

      	 echo "<script>alert('Login Failed!!')</script>";
		  echo "Your Login Username or Password is invalid";

      }

        }else {
		  echo "<script>alert('Login Failed!!')</script>";
		  echo "Your Login Username or Password is invalid";
         
      }
   }

?>
