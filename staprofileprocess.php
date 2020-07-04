<?php
session_start();
$cuser = $_SESSION['name'];
$conn = new mysqli("localhost","root","","pm");
if($conn->connect_error){
	die("couldnot connect to db");
}
else {

if(isset($_POST['profSubmit'])) {
	$name = $_POST['name'];
	$sql = "UPDATE studentd SET name='$name',pwd = '$pwd',dept='$dept', studentnames = '$studentnames' WHERE id = '$id'";
	if(mysqli_query($conn,$sql)) {
		header('location:staffloggedin.php');
	}
	else {
		echo $conn->error;
	}
}
}
?>
<html>
 <head>
        <title>Editing Profile</title>
        <link rel="stylesheet" href="uikit/css/uikit.min.css" />
       <!-- <script src="uikit/js/jquery.js"></script> -->
        
        <!-- Jquery JS File -->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <!-- UI KIT JS File -->
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/uikit-icons.min.js"></script>     
</head>
<body>

<?php
session_start();
$id= $_SESSION['id'];
$sqlcheck = "SELECT * FROM staffd WHERE id='$id'";
$r = mysqli_query($conn,$sqlcheck);
while($f = mysqli_fetch_assoc($r)) {
echo "<div class='uk-child-width-1-3@m uk-grid-small uk-grid-match' uk-grid>
    <div></div><div>
	<form action='' method='post'>
	<hr>
	<h2>Personal Details</h2>
	<div class='uk-margin'>Staff Id : <input type='number' name='id' required value='".$f['id']."' class='uk-input' ></div><br>
	<div class='uk-margin'>Staff Name : <input type='text' name='sname' required value='".$f['sname']."' class='uk-input' ></div><br>
	<div class='uk-margin'> Password : <input type='text' name='pwd required value='".$f['pwd']."' class='uk-input' ></div><br>
	<div class='uk-margin'>Department: <input type='text' name='dept' required value='".$f['dept']."' class='uk-input' ></div><br>
	<div class='uk-margin'>	Student Name : <input type='text' name='studentnames' required value='".$f['studentnames']."' class='uk-input' ></div><br>
	<input type='submit' value='SAVE' name='profSubmit' class='uk-button uk-button-primary'>
	<hr>
</form></div>
<div></div>
</div>";	
}
?>
</body>
</html>