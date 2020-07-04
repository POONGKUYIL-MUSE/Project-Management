<?php
include "config.php";
session_start();
$cuser = $_SESSION['username'];

if(isset($_POST['profSubmit'])) {
	$name = $_POST['name'];
	$sql = "UPDATE studentd SET username='$accname',email='$email',age='$age',mobile='$mbl',address='$address',city='$city',state='$state',country='$country',gpayname='$gpayname',gpaymail='$gpaymail' WHERE username = '$cuser'";
	if(mysqli_query($conn,$sql)) {
		header('location:studentloggedin.php');
	}
	else {
		echo $conn->error;
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
$sqlcheck = "SELECT * FROM registerdetails WHERE username='$cuser'";
$r = mysqli_query($conn,$sqlcheck);
while($f = mysqli_fetch_assoc($r)) {
echo "<div class='uk-child-width-1-3@m uk-grid-small uk-grid-match' uk-grid>
    <div></div><div>
	<form action='' method='post'>
	<hr>
	<h2>Personal Details</h2>
	<div class='uk-margin'>Account Name : <input type='text' name='acname' required value='".$f['username']."' class='uk-input' ></div><br>
	<input type='submit' value='SAVE' name='profSubmit' class='uk-button uk-button-primary'>
	<hr>
</form></div>
<div></div>
</div>";	
}
?>

</body>
</html>