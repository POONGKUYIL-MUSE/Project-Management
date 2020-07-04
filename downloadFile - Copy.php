<!DOCTYPE html>
<html>
<head>
	<title>Download the file</title>
</head>
<body>
<?php

if(isset($_GET['sn'])){
	$id = intval($_GET['sn']);

	if($id<=0){
		die("The ID is invalid");
	}
	else {
		
		$conn = new mysqli("localhost","root","","filesdb");
		if($conn->connect_error){
			die("couldnot connect to db");
		}
		else {
			$sql = "SELECT * FROM fileList WHERE sn='$id'";
			$result = mysqli_query($conn,$sql);
			if($result->num_rows == 1){
				$row = mysqli_fetch_assoc($result);

				//print headers
				header("Content-Type: ".$row['mime']);
				header("Content-Length: ".$row['size']);
				header("Content-Disposition: attachment; filename=".$row['name']);

				//print data
				echo $row['data'];

			}
			else{
				echo "error no file exists with that ID";
			}
		}

	}
}

?>
</body>
</html>