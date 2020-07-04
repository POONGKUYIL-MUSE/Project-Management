<?php
include "config.php";
if(isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$dept = $_POST['dept'];
	//$n="select * from studentd where emailid='$id'";
//$result=mysqli_query($conn,$n);
//$authenticate=mysqli_fetch_assoc($result);
$sql="insert into staffd(id, name, pwd,dept) values('$id','$name','$pwd', '$dept')";
if($conn->query($sql)=== TRUE)
{
	//echo "insr".$conn->error;
}
else
{
	echo "not insr".$conn->error;
	}
$conn->close();
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
			Enter Dept:<input type="text" name="dept" required>
			<center><input type="submit" name="submit" value="Sign In"></center>
		</form>
		<hr id="hr1"><br>
		<center><a href="student.php">Sign Up</a></center>
	</div>
	<?php 
}
else {
	echo "<script>alert('Not a Proper login');</script>";
	header("location:student.php");
}
?>

</body>
</html>