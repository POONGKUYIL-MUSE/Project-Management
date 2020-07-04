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
<tr><td><img src="profile.jpg" align="center" width="70%;" height="70%;"></td></tr>
<tr><td><img src="staprofile.jpg" align="center" width="200%;" height="300%;"></td></tr>
</table>
<?php
session_start();
$conn = new mysqli("localhost","root","","pm");
if($conn->connect_error){
	die("couldnot connect to db");
}
else {
$id = $_SESSION['id'];
$sqlcheck = "SELECT * FROM staffd WHERE id='$id'";
$r = mysqli_query($conn,$sqlcheck);
while($f = mysqli_fetch_assoc($r)) {
echo "<form action='staprofileprocess.php'>
	<hr>
	<h2>Personal Details</h2>
	Staff id : ".$f['id']."<br>
	Staff Name : ".$f['sname']."<br>
	Password: ".$f['pwd']."<br>
	Dept : ".$f['dept']."<br>
	Student Names : ".$f['studentnames']."<br>
	<hr>
<input type='submit' value='EDIT' name='profSubmit2'> 
	<hr>
</form>";	
}
}
?>
</body>
</html> 