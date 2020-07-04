<?php
//include 'studentdb.php';
?>
<html>
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
	<div class="form-style">
		<h2>Sign Up</h2>
		<form method="post" action="studentdb.php">
			<input type='number' name="id" placeholder="Enter id" required>
			<input type="text" name="name" placeholder="Enter Username" required>
			<input type="password" name="pwd" placeholder="Enter Password" required>
			<input type="text" name="dept" placeholder="Enter department" required>		
			<input type="text" name="gname" placeholder="Enter guide name" required>		
			<center><input type="submit" name="submit1" value="Sign Up"></center>
		</form>
		<hr id="hr1"><br>
		<center><a href="studentlogin.php">Sign In</a></center>
	</div>
<body>
</html>





