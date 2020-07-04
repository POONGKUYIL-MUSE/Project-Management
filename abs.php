<!DOCTYPE html>
<html>
<head>
	<title>Abstract Confirmation</title>
</head>
<body>

<?php
session_start();
$sid=$_SESSION['id'];
/*
Function Definitions
*/

function Punctuation($array) {

	$punc = str_replace(array("?","!",",",";",".","'","-"), "", $array);
	return $punc;
}

function lowercase($array) {
	$lower = strtolower($array);
	return $lower;
}

function explodeArray($array) {
	$exploded = explode(" ", $array);
	//echo "<br>";
	//print(count($exploded));
	//echo "<br>";
	return $exploded;
}

function removePreposition($array){
	$prepos = ['of', 'with', 'at', 'from', 'into','an','a', 'and', 'as', 'is', 'it','that', 'this', 'their', 'thus', 'also', 'can', 'during', 'including', 'until', 'against', 'among', 'throughout', 'despite', 'towards', 'upon', 'to' ,'in', 'for', 'on', 'by', 'about', 'like', 'through', 'over', 'before', 'after', 'since', 'plus', 'but','up', 'within', 'following', 'except', 'but', 'the', 'around', 'off', 'near'];

	$refinedArray = array_diff($array, $prepos);
	return $refinedArray;

}

//echo $_POST['abs'];
//echo $_POST['title'];
$abs = $_POST['abs'];
$title = $_POST['title'];
$startdate=$_POST['startdate'];
$starttime=$_POST['starttime'];
$enddate=$_POST['enddate'];
$endtime=$_POST['endtime'];



$conn = new mysqli("localhost", "root", "", "pm");
if($conn->connect_error){
	echo "Problem in Connecting the Database";
}
else {
	$absCheck = "select * from projectidea";
	$results = mysqli_query($conn, $absCheck);
	if(mysqli_num_rows($results) != 0){
		while($row = mysqli_fetch_assoc($results)){

			$existsAbs = $row['abstract'];
			$newAbs = $_POST['abs'];
			//echo $existsAbs;
			//echo $newAbs;

			//Filtering existsAbs
			$removedPunc1 = Punctuation($existsAbs);
			$lowered1 = lowercase($removedPunc1);
			$IdeaArray1 = explodeArray($lowered1);
			$removedPrepos = removePreposition($IdeaArray1);

			/*print_r($removedPrepos);
			echo "<br>";
			print(count($removedPrepos));
			*/

			//Filtering newAbs
			$removedPunc2 = Punctuation($newAbs);
			$lowered2 = lowercase($removedPunc2);
			$IdeaArray2 = explodeArray($lowered2);
			$removedPrepos2 = removePreposition($IdeaArray2);

			/*echo "<hr><br>";
			print_r($removedPrepos2);
			echo "<br>";
			print(count($removedPrepos2));

			echo "<hr>";
				*/

			$matches = array_intersect($removedPrepos, $removedPrepos2);

			$a = round(count($matches));
			$b = count($removedPrepos);

			$similarity = $a / $b * 100;

			//echo "<hr><br>".$similarity."%<br>";

			//echo "<hr><hr><hr>";


			if($similarity<=40){
				$insertAbs = "insert into projectidea(sid,title, abstract,startdate,starttime,enddate,endtime) values('$sid','$title', '$abs','$startdate,'$starttime','$enddate', '$endtime')";
				if(mysqli_query($conn, $insertAbs)){
					echo "inserted";
					echo"<script>alert('your title and abstract is inserted successfully.
			soon your uploaded title will be confirmed');</script>";
			header('location:studentloggedin.php');
			
				}
			}
			else{
				echo "Plagiarism Found in your Abstract";
				echo"<script>alert('submit new title ideas with abstract. because the title is already matched with some student idea);</script>";
			header('location:studentloggedin.php');
			
			}
			
		}
	}
	else {
		$insertAbs = "insert into projectidea(sid,studentname,title, abstract,startdate,starttime,enddate,endtime) values('$sid','$studentname','$title', '$abs','$startdate,'$starttime','$enddate', '$endtime')";

		if(mysqli_query($conn, $insertAbs)){
			echo"<script>alert('your title and abstract is inserted successfully.
			soon your uploaded title will be confirmed');</script>";
			header('location:studentloggedin.php');
			
		}
	}
	
}

?>
</body>
</html>