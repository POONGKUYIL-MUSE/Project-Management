<html>
<body>
<?php
session_start();
$sid=$_SESSION['id'];
$conn = new mysqli('localhost','root','','pm');
if($conn->connect_error) {
	die('not connected to db');
}
else {
	echo "connected";
$sid=$studentname=$titlename=$startdate=$starttime=$enddate=$endtime=$projectabstract=$startdate1=$starttime1=$enddate1=$endtime1=$name=$mime=$size=$created=$sn="";


if(isset($_GET['title'])){
echo "title is<br>" .$_GET['title'];
$title=$_GET['title'];
$titledetails = "select * from titleup where titlename='$title' ";
	$result = mysqli_query($conn, $titledetails);
	if($result->num_rows==0){
		echo "There are no files";
	}
	else {
		
		while($row=mysqli_fetch_assoc($result)){
		$sid= $row['sid'];
			$titlename = $row['titlename'];
			//echo "done1";
			}
		
		}
	//echo $studentname;

$sql = "SELECT * FROM projectidea where sid='$sid'";
	$result1 = mysqli_query($conn,$sql);
	if($result1->num_rows==0){
		echo "There are no files";
	}
	else {
		
		while($row=mysqli_fetch_assoc($result1)){
			$projectabstract= $row['abstract'];
			$startdate1 = $row['startdate'];
			$starttime1 = $row['starttime'];
			$enddate1 = $row['enddate'];
            $endtime1 = $row['endtime'];
			}
	}

$sql3 = "SELECT * FROM filelist where sid='$sid' ";
	$result2 = mysqli_query($conn,$sql3);
	if($result2->num_rows==0){
		echo "There are no files";
	}
	else {
		
		while($row=mysqli_fetch_assoc($result2)){
		
	        $name=$row['name'];
			$mime= $row['mime'];
			$size=$row['size'];
			$created=$row['created'];
			$dockey= $row['sn'];
		}
		
		}
}	
}
?>
</body>
</html>