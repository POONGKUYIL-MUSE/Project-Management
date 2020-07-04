//STAFF PAGE REDIRECTION
<html>
<head>
	<h1 align="center"  bgcolor="yellow"  color='red'>UPLOADED DOCUMENTATION</h1>
</head>
<body>
<?php
session_start();
$sid=$_SESSION['id'];

$conn = new mysqli("localhost","root","","pm"); 
if($conn->connect_error){
	die("couldnot connect to db");
}
else {

$tsql = "SELECT * FROM titleup";
	$res = mysqli_query($conn,$tsql);
	while($row = mysqli_fetch_assoc($res)) {
		echo "<table align='center' cellpadding='15px' cellspacing='15px'>
		<th>si</th>
		<th>STUDENTNAME</th>
		<th>titlename</th>
	<tr align='center'><td>".$row['sid']."</td>
	<td>".$row['studentname']."</td>
		<td><a href='titledetails.php?title=".$row['titlename']."'>".$row['titlename']."</a></td>
		</tr></table>";
	}

}
?>
</body>
</html>