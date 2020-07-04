<html>
<head>
<link rel="stylesheet" type="text/css" href="navbarStyle.css">
<style>
body{
	//background-color: pink;
	background-image: url("images/bgimg.jpeg");
	background-position: center;
	background-repeat: no-repeat;
	height: 100%;
}
</style></head>
<body>
<h1 align="center">STUDENT</h1>

<?php
session_start();
$id=$_POST['id'];
$_SESSION['id'] = $id;
?>
<header>
<nav>
<ul class="nav">
<li><a href="studentloggedin.php" id="defaultOpen">Activity</a></li>
<li><a href="stuprofile.php">MyProfile</a></li>
<li><a href="studentview.php">View and Verify</a></li>
</ul>
</nav>
</header>
<script>
setInterval(function(){
	var xmlhttp2 = new XMLHttpRequest();
					xmlhttp2.open('GET','inboxupdater.php',false);
					xmlhttp2.send(null);
					document.getElementById('demo').innerHTML = xmlhttp2.responseText;
},1000);
</script>
<form method="post" action="titleup.php">
<table align="center" cellpadding='20px' cellspacing='20px'>
<tr>
<th>TITLE CONFIRMATION</th>
<th>PAPER PRESENTATION</th>
<th>UPLOADING DOCUMENTATION</th>
</tr>
<tr>
<td>
<a href ="titleup.php">
<img src="titleimg.jpg" width="156px" height="156px"/> </a>
</td>
<br><br>  
</form>
<form method="post" action="studentview.php">
<td>
<a href ="studentview.php">
<img src="pptimg.jpg" width="156px" height="156px"/> </a>
</td>
<br><br> 
</form>
<form method="post" action="studentup.php">
<td>
<a href ="studentup.php">
<img src="up.jpeg" width="156px" height="156px"/></a>
</td>
</form>
</tr>
</table>
</form>
</body>
</html>
