<!DOCTYPE html>
<html>
<head>
	<title>View Files in DB</title>
</head>
<body>
<?php
$conn = new mysqli("localhost","root","","filesdb");
if($conn->connect_error){
	die("couldnot connect to db");
}
else {
	$sql = "SELECT * FROM fileList";
	$result = mysqli_query($conn,$sql);
	if($result->num_rows==0){
		echo "There are no files";
	}
	else {
		echo "<table width=100%>
		<tr><th>Name</th>
		<th>Mime</th>
		<th>Size(bytes)</th>
		<th>Created</th>
		<th>Download</th></tr>";

		while($row=mysqli_fetch_assoc($result)){
			echo "<tr>
			<td>".$row['name']."</td>
			<td>".$row['mime']."</td>
			<td>".$row['size']."</td>
			<td>".$row['created']."</td>
			<td><a href='downloadFile.php?sn=".$row['sn']."'>Download</a></td></tr>";
		}

		echo "</table>";
	}
}
?>
</body>
</html>