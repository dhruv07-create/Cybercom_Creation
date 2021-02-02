<!DOCTYPE html>
<html>
<head>
	<title>PracticalsForm</title>
</head>
<body>

<form action="cyber2021-2-2.php" method="post">
	
	Name: <br>
	<input type="text" name="name"><br><br>
	Email: <br>
	<input type="text" name="email"><br><br>

	<input type="submit" name="submit"><br><br>

    <p>Use Name is: <?php echo $_POST["name"] ?></p><br><br>

     <p>Use Email is: <?php echo $_POST["email"] ?></p><br><br>
</form>

</body>
</html>