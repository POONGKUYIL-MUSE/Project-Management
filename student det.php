<?php
include "config.php";
if(isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$guide = $_POST['guide'];
	$project= $_POST['project'];
	if($conn)
	$sql = ("INSERT INTO studentd(id, name, pwd, guide, project) VALUES ('$id', '$name', '$pwd', '$guide', '$project')");
	$query = mysqli_query($conn,$sql);
	if($query)
	{	
	echo 'inserted';
	}
	else{
		echo 'failed';
	}
}
mysqli_close($conn);
?>
	