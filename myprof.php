<?php
session_start();
include "config.php";
include_once "loggedin.php";
$cuser = $_SESSION['username'];
?>
<html>
<head>
<style>
body {
  background-color: #dcdde1;
}
</style>
</head>
<body>
<?php
$sqlcheck = "SELECT * FROM registerdetails WHERE username='$cuser'";
$r = mysqli_query($conn,$sqlcheck);
while($f = mysqli_fetch_assoc($r)) {
echo "<form action='profprocess.php'>
	<hr>
	<h2>Personal Details</h2>
	Student Name : ".$f['username']."<br>
	<hr>
	<input type='submit' value='EDIT' name='profSubmit'> 
	<hr>
</form>";	
}
?>
</body>
</html>