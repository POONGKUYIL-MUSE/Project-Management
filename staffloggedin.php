<html>
<head>
<h1 align="center">STAFF</h1>
<link rel="stylesheet" type="text/css" href="navbarStyle.css">
<style>
	body{
	//background-color: pink;
	background-image: url("C:\xampp\htdocs\project management\img - Copy");
	background-position: center;
	background-repeat: no-repeat;
	height: 100%;
}

</style>

</head>
<body>
<img src="bgimg.jpeg" align="center" width="100%;">
<?php
session_start();
$id=$_POST['id'];
$_SESSION['id'] = $id;
?>
<header>
<nav>
<ul class="nav">
<li><a href="activity.php" id="defaultOpen">Activity</a></li>
<li><a href="staprofile.php">MyProfile</a></li>
<li><a href="staprofile.php">View and Update marks</a></li>

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
<form method="post" action=" ">
<table align="center" cellpadding='20px' cellspacing='20px'>
<tr>
<th>TITLE CONFIRMATION</th>
<th> </th>
<th> </th>
</tr>
<tr>
<td>
<a href ="titleview.php">
<img src="titleimg.jpg" width="156px" height="156px"/> </a>
</td>
<br><br>  
</form>
<form method="post" action="staffview.php">
<td>
<a href ="staffview.php">
<img src="view.jpeg" width="156px" height="156px"/></a>
<br><br>
</td>
</form>
</tr>
</form>
</table>
</form>
</body>
</html>
