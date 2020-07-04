 <!DOCTYPE html>
<html>
<head>
	<h1 align="center"  bgcolor="yellow"  color='red'>UPLOADED DOCUMENTATION</h1>
</head>
<body>
<?php
$conn = new mysqli("localhost","root","","pm"); 
if($conn->connect_error){
	die("couldnot connect to db");
}
else {
	$sql3 = "SELECT * FROM filelist";
	$result = mysqli_query($conn,$sql3);
	if($result->num_rows==0){
		echo "There are no files";
	}
	else {
		echo "<table border='3px' width=100%>
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
		//STAFF PAGE REDIRECTION

$tsql = "SELECT * FROM titleup WHERE studentname='studentname'";
	$res = mysqli_query($conn,$tsql);
	while($row = mysqli_fetch_assoc($res)) {
		echo "<table>
		<tr align='center'><td>".$row['studentname']."</td>
		<td>".$row['titlename']."</td>
		<td>".$row['startdate']."</td>
		<td>".$row['starttime']."</td>
		<td>".$row['enddate']."</td>
		<td>".$row['endtime']."</td>
		</tr></table>";
	}


		echo "</table>";
	}
}
?>
</body>
</html>