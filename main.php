<!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
</head>
<body>
	<?php
		$conn = new mysqli("localhost", "root", "", "pm");
		if($conn->connect_error){
			echo "Problem in Connecting the Database";
		}
		else {
		}
	?>

	Enter your Project Title
	<form action="" method="post">
		<input type="text" name="title">
		<input type="submit" value="Submit Title" name="sbtn">
	</form>

	<?php
		if(isset($_POST['sbtn'])){
			$title = $_POST['title'];
			//echo $title;
			$titleCheck = "select * from titleup where prjtTitle='$title'";
			$results = mysqli_query($conn, $titleCheck);
			$rows = mysqli_num_rows($results);
			if($rows != 0){
				//echo $rows;
				echo "Project Title already exists";
			}
			else {
				echo "zero rows".$rows;
				$confirmTitle = "insert into titleup(prjtTitle) values('$title')";
				if(mysqli_query($conn, $confirmTitle)){
					//echo "Title confirmed";
					header("location:titleup.php?title=$title");
				}
				else {
					echo "Error in inserting into db. But your title is confirmed. Please check with the Database Admin. The error is due to ";
					echo "<br>";
					echo $conn->error;
				}
			}
		}

		if(isset($_GET['title'])){
			$title = $_GET['title'];
			session_start();

			//echo $title;

			echo "
			<form action='abs.php' method='post'>
			<input type='text' name='title' value='$title' readonly><br>
			Describe your Project Idea:<br>

			<textarea rows=20 cols=100 name='abs'></textarea>
			<input type='submit' value='Submit Project Idea' name='psbtn'>
			</form>
			";



		}
	?>
</body>
</html>