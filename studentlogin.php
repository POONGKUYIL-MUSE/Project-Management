<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="formStyle.css">
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
		<h2>Sign In</h2>
		<form method="post" action="studentloggedin.php">
			Enter Id:<input type="number" name="id" required>
			Enter Username:<input type="text" name="username" required>
			Enter Password:<input type="password" name="psw" required>
			<center><input type="submit" name="submit" value="Sign In"></center>
		</form>
		<hr id="hr1"><br>
		<center><a href="start.php">Sign Up</a></center>
	</div>
</body>
</html>