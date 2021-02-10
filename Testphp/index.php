<?php

$Host_name="localhost";
$user_name="root";
$user_password="";
$user_Database="newdatabase";
$mycon=mysqli_connect($Host_name,$user_name,$user_password,$user_Database);

if(!@mysqli_connect($Host_name,$user_name,$user_password,$user_Database)){
	
	die("Not Connected !".mysqli_error($mycon));
	
}

?>