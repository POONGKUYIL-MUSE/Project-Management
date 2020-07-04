<!DOCTYPE html>
<html>
<head>
	<title>Upload Files and store in db</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	Description of the file : <br>
	<input type="text" name="desc"><br>
	Upload File : <br>
	<input type="file" name="uplfile"><br>
	<input type="submit" name="sbtn" value="Upload NOW">
</form>

<?php
if(isset($_POST['sbtn'])){
	//create sql query
		$sql = "INSERT INTO filelist (name,mime,size,data,created) VALUES('$name','$mime','$size','$data',NOW())";
		if(mysqli_query($conn,$sql)){
			echo ",,,inserted into db";
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