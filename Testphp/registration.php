<?php
include 'index.php';

session_start();

if(isset($_SESSION['login_user'])){
    
  header("Location: http://localhost/my/ABC/Testphp/home.php");

  }


  if(isset($_POST['submit'])){

       if(isset($_POST['term'])){

                     echo$password = $_POST['password'];
                    echo $cofirm = $_POST["cpassword"];
                     $information =$_POST["information"];
                     $prefix = $_POST["prefix"];
                     $first_name = $_POST['first_name'];
                     $last_name = $_POST['last_name'];
                     $mobile = $_POST["mobile"];
                     $information =$_POST["information"];
                     $email = $_POST['email'];

           $q="select * from user where email='".$email."';";
           $result=mysqli_query($mycon,$q) or exit("email is not verified"); 

         if(mysqli_num_rows($result)>0){

           echo "<script>alert('email is already exist')</script>";

         }else{

             
               if($password==$cofirm){

                

    $insert="INSERT INTO `user`(`prifix`, `firstname`, `lastname`, `mobile`, `email`, `password`, `information`) VALUES ('$prefix','$first_name','$last_name','$mobile','$email','$password','$information')";

  $result1=mysqli_query($mycon,$insert) or exit("Query not running");

  header("Location: http://localhost/my/ABC/Testphp/login.php");

   }else{

    echo "<script>alert('password is not match')</script>";


   }

 } 
}
else{echo "<script>alert('Please Accept term and condition')</script>";}

} 

?>
<html>  
    <head>  
        <title>Register form</title>  

        <style type="text/css">
          
        span{
 
           color: red;

        }


        </style>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container" style="width: 600px">
   <br />
   
   <h3 align="center">Register Here</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">Register Form</div>
    <div class="panel-body">
     <form method="POST" action="registration.php" onsubmit="return validation()"  >
      <div class="form-group">
       <strong>Prefix:</strong>
       <select name="prefix">
          <option value="mr" >Mr</option>
          <option value="mrs" >Mrs</option>
       </select> <br>
       <span id="prefix1"></span>
       <div class="row">
        <div class="col-md-6">
         <label>First Name</label>
         <input type="text" name="first_name" id="first_name" class="form-control"  />
          <br>
       <span id="firstname1"></span>
        </div>
        <div class="col-md-6">
         <label>Last Name</label>
         <input type="text" name="last_name" id="last_name" class="form-control"   />
          <br>
       <span id="lastname1"></span>
        </div>
       </div>
      </div>
      <div class="form-group">
       <label>Email Address</label>
       <input type="text" name="email" id="email" class="form-control"  id="email"
       size="30" />
        <br>
       <span id="email1"></span>
      </div>
      <div class="form-group">
       <label>mobilenumber</label>
       <input type="text" name="mobile" id="mobile" class="form-control" 
        />
         <br>
       <span id="mobile1"></span>
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="password" id="password" class="form-control" 
				/>
         <br>
       <span id="password1"></span>
      </div>
      <div class="form-group">
       <label>cofirm Password</label>
       <input type="password" name="cpassword" id="cpassword" class="form-control" >
        <br>
       <span id="cpassword1"></span>
      </div>
      
       <div class="form-group">
       <label>information</label>
       <p><textarea name="information" rows="5" cols="30"  ></textarea></p><br><br>
        <br>
       <span id="information1"></span>
       <input type="checkbox" name="term">&nbsp; Hereby,I Accept Term & Condition
        <br>
       <span id="term1"></span>
      </div>
        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-lg" value="submit">   		
		</br><label class="checkbox-inline">  Already have an account? </label>
		<a href="login.php">Login now</a>
	 </form>
    </div>
   </div>
  </div>

   <script type="text/javascript" src="validation.js"></script>

    </body>  
</html>

