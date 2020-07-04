<?php
$conn = new mysqli('localhost','root','','pm');
if($conn->connect_error) {
	die('not connected to db');
}
else {
	//echo "connected";
	if(isset($_POST['submit1'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$dept = $_POST['dept'];
	$gname = $_POST['gname'];
//$n="select * from studentd";
//$result=mysqli_query($conn,$n);
//$authenticate=mysqli_fetch_assoc($result);
$sql="insert into studentd(id, name, pwd, dept, gname) values('$id','$name','$pwd','$dept', '$gname')";
if($conn->query($sql)=== TRUE)
{
	echo "insr";
	header('location:studentlogin.php');
}
else
{
	echo "not insr".$conn->error;
	}
$conn->close();
}

}
?>