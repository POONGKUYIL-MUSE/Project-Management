<?php
session_start();
$sid=$_SESSION['id'];
$conn= new mysqli('localhost', 'root', '', 'pm');
if($conn->connect_error){
	die('not connected');
}
else{
if(isset($_POST['update'])){
	$sid=$_POST['sid'];
	$studentname = $_POST['studentname'];
	$titlename = $_POST['titlename'];
	
$tsql= "insert into  titleup(sid, studentname, titlename) values ('$sid', '$studentname', '$titlename')";
if($conn->query($tsql)===TRUE){
//echo "inserted";
header("location:titleupdb.php?title='$titlename'");
	}
else{
	echo "not inserted" .$conn->error;
    }
}
if(isset($_GET['title'])){
			$title = $_GET['title'];

			//echo $title;

			echo "
			<form action='abs.php' method='post'>
			<input type='text' name='title' value=$title> 
			Describe your Project Idea:<br>
			<textarea rows=20 cols=100 name='abs'></textarea><br><br> 

			Start Date<input type='date' name='startdate'><br><br> 
	Start Time<input type='time' name='starttime'><br><br>
	End Date<input type='date' name='enddate'><br><br> 
	End Time<input type='time' name='endtime'><br><br>
	
			<input type='submit' value='Submit Project Idea' name='psbtn'>
			</form>
			";
			



		}
	
$conn->close();
    }
?>