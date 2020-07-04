<html>
<head>
</head>
<body>

<?php
$conn = new mysqli('localhost','root','','sampledb');
if($conn->connect_error) {
	die('not connected to db');
}
else {
	echo "connected";
	if(isset($_POST['submit'])) {
	$nm = $_POST['nm'];
	$pwd = $_POST['pwd'];
$sql="insert into sampledb(nm, pwd) values('$nm','$pwd')";
if($conn->query($sql)=== TRUE)
{	echo "insr";
header('location:studentlogin.php');
$sqlcheck = "SELECT * FROM sampledb WHERE nm='$nm'";
$r = mysqli_query($conn,$sqlcheck);
while($f = mysqli_fetch_assoc($r)) {
echo "<form action='' method='post'>
	<hr>
	<h2>Personal Details</h2>
	<div class='uk-margin'>Student Id : <input type='number' name='nm' required value='".$f['name']."' class='uk-input' ></div><br>
	<div class='uk-margin'>Student Name : <input type='text' name='pwd' required value='".$f['dept']."' class='uk-input' ></div><br>
}
else
{
	echo "not insr" .$conn->error;
	}
	}

$conn->close();
</form>";	
}
}
?>

</body>
</html>