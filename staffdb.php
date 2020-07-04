<?php
$conn = new mysqli('localhost','root','','pm');
if($conn->connect_error) {
	die('not connected to db');
}
else {
	echo "connected";
	if(isset($_POST['submit2'])) {
	$id = $_POST['id'];
	$sname = $_POST['sname'];
	$pwd = $_POST['pwd'];
	$dept = $_POST['dept'];
	$studentnames = $_POST['studentnames'];
//$n="select * from studentd where emailid='$id'";
//$result=mysqli_query($conn,$n);
//$authenticate=mysqli_fetch_assoc($result);
	$sql1="insert into staffd(id, sname, pwd, dept, studentnames) values('$id','$sname','$pwd','$dept', '$studentnames')";
	if($conn->query($sql1)=== TRUE)
	{
		echo "insr";
		header('location:studentlogin.php');

	}
	else
	{
		echo "not insr".$conn->error;
		}
		}
	mysqli_close($conn);
		}

	?>
