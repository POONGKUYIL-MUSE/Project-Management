<html>
<head>
<style>
body {
  background-color: #dcdde1;
}
</style>
</head>
<body>
<table>
<br><tr><img src="profile.jpg" align="center" width="50%;" height="50%;"></tr>
<tr><img src="stuprofile.jpg" align="center" width="100%;"></tr>
</table>
<?php
session_start();
$conn = new mysqli("localhost","root","","pm");
if($conn->connect_error){
	die("couldnot connect to db");
}
else {
$id = $_SESSION['id'];
$sqlcheck = "SELECT * FROM studentd WHERE id='$id'";
$r = mysqli_query($conn,$sqlcheck);
while($f = mysqli_fetch_assoc($r)) {
echo "<form action='stuprofileprocess.php'>
	<hr>
	<h2>Personal Details</h2>
	Staff id : ".$f['id']."<br>
	Staff Name : ".$f['name']."<br>
	Password: ".$f['pwd']."<br>
	Dept : ".$f['dept']."<br>
	Guide Name : ".$f['gname']."<br>
	<hr>
	<input type='submit' value='EDIT' name='profSubmit1'> 
	<hr>
</form>";	
}
}
?> 
</body>
</html>