<?php 

include "index.php";

session_start();

if(!isset($_SESSION['login_user'])){
    
  header("Location: http://localhost/my/ABC/Testphp/login.php");
 
 }

$id=$_GET['id'];

	$q="delete from product1 where pid=$id;";

	$result=mysqli_query($mycon,$q) or die("Quer not running..");

	$q1="delete from pc where pid=$id;";

	$result1=mysqli_query($mycon,$q1) or die("Quer not running..");

	header('Location: http://localhost/PhpTutorial/MysqlData/project2/product.php');


?>