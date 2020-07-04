<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="formStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<img src="background2.jpg">
	<style>
	body, html {
		
	  align: absolute;
	  height: 100%;
	  font-family: Arial, Helvetica, sans-serif;
	}

	* {
	  box-sizing: border-box;
	}

	/* Add styles to the form container */
	.img {
	  /* The image used */
	  
	  min-height: 380px;
	  width:100%;
	  /* Center and scale the image nicely */
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	  position: relative;
	}
	.container {
      position: absolute;
	  margin: 100px;
	  max-width: 500px;
	  max-height: 200px;
	  padding: 56px;
	}
	input[type=text] {
	  align: center;
	  width: 50%;
	  padding: 25px;
	  margin: 5px 0 22px 0;
	  border: none;
	  background: pink;
	}
	input[type=text]:focus {
	  align: center;
	  background-color: pink;
	  outline: none;
	}
	/* Set a style for the submit button */
	.btn {
	  align: center;
	  background-color: #4CAF50;
	  color: pink;
	  padding: 16px 20px;
	  border: none;
	  cursor: pointer;
	  width: 50%;
	  opacity: 0.9;
	}

	.btn:hover {
	  opacity: 5;
	}
	</style>
	</head>
	<body>
	<div class="form-style">
	  <form action="" method="post" enctype="multipart/form-data">
		<font size="5px">
		<br>
		<b>STUDENT NAME:<input type="text" name="studentname" placeholder="studentname" required></b><br><br>
		<b>Description of the file :<input type="text" name="desc"><br></font> </b>
		<font size="5px"><b>Upload File :</b> <br>
		<input type="file" class="btn" name="uplfile"><br>
		<input type="submit" class="btn" name="sbtn" value="Upload NOW">
	</form>
	</div>
	
<?php
	if(isset($_POST['sbtn'])){
		
		//ensure file has no error
		if($_FILES['uplfile']['error']==0){

			//db connection 
			$conn = new mysqli("localhost","root","","pm");
			if($conn->connect_error){
				die("could not connect to db");
				echo  "notconn";
			}

	
		//gather required data
		$studentname = mysqli_real_escape_string($conn,$_POST['studentname']);
			$name = mysqli_real_escape_string($conn,$_FILES['uplfile']['name']);
			$mime = mysqli_real_escape_string($conn,$_FILES['uplfile']['type']);
			$data = mysqli_real_escape_string($conn,file_get_contents($_FILES['uplfile']['tmp_name']));
			$size = mysqli_real_escape_string($conn,$_FILES['uplfile']['size']);

			//create sql query
			$sql3 = "INSERT INTO filelist (studentname,name,mime,size,data,created) VALUES('$studentname','$name','$mime','$size','$data',NOW())";
			if(mysqli_query($conn,$sql3)){
				echo "inserted into db";
			}else {
				echo "not inserted into db (~_~)".$conn->error;
			}

		}
		else {
			echo "error while file was being uploaded. Error Code : ".intval($_FILES['uplfile']['error'])."<br>".$_FILES['uplfile']['error'];
			
		}
	}

	?>
	</body>
	</html>