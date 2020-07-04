<?php
$conn = new mysqli('localhost','root','','pm');
if($conn->connect_error) {
	die('not connected to db');
}
else {
	//echo "connected";
	if(isset($_POST['rsubmit'])) {
	$studentname = $_POST['studentname'];
	$review1 = $_POST['review1'];
	$review2 = $_POST['review2'];
	$review3= $_POST['review3'];
	$finalreview = $_POST['finalreview'];
$rsql="insert into reviewtab(studentname, review1, review2, review3, finalreview ) values('$studentname', '$review1','$review2','$review3','$finalreview')";
if($conn->query($rsql)=== TRUE)
{
	echo "insr";
}
else
{
	echo "not insr".$conn->error;
	}
	}
mysqli_close($conn);
}
?>
