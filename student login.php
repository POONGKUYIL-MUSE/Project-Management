<?php
include "config.php";
if(isset($_POST['stusubmit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$n="select * from studentd where id='$id'";
	$result=mysqli_query($conn,$n);
	$result=mysqli_query($conn,$n);
	$authenticate=mysqli_fetch_assoc($result);
	}
else {
	echo "<script>alert('Not a Proper login');</script>";
	header("location:student.php");
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="formStyle.css">
</head>
<body>
	<div class="form-style">
		<h2>Sign In</h2>
		<form method="post" action="studentd.php">
			Enter ID: <input type="number" name="id" required>
			Enter Username:<input type="text" name="username" required>
			Enter Password:<input type="password" name="pwd" required>
			<center><input type="submit" name="stusubmit" value="Sign In"></center>
		</form>
		<hr id="hr1"><br>
		<center><a href="student.php">Sign Up</a></center>
	</div>
</body>
</html>