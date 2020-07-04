<?php
//include 'staffdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="formStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
	//background-color: pink;
	background-image: url("sample.jpg");
	background-position: center;
	background-repeat: no-repeat;
	height: 50%;
}
</style>
</head>
<body>

	<div class="form-style">
		<h2>Sign Up</h2>
		<form method="post" action="staffdb.php">
			<input type="number" name="id" placeholder="Enter id" required>
			<input type="text" name="sname" placeholder="Enter Username" required>
			<input type="password" name="pwd" placeholder="Enter Password" required>
			<input type="text" name="dept" placeholder="Enter department" required>		
			<input type="text" placeholder="Enter students names" name="studentnames" required/>		
			<center><input type="submit" name="submit2" value="Sign Up"></center>
		</form>
		<hr id="hr1"><br>
		<center><a href="stafflogin.php">Sign In</a></center>
	</div>
</body>
</html>  