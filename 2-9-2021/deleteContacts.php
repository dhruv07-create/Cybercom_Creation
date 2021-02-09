<?php 

include "index.php";

$id=$_GET['id'];

	$q="delete from contacts where id=$id;";

	$result=mysqli_query($mycon,$q) or die("Quer not running..");

	header('Location: http://localhost/PhpTutorial/MysqlData/contacts.php');


?>