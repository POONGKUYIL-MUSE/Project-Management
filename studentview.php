<html>
<head>
<h1 align="center">STUDENT</h1>
</head>
<body>
<header>
<nav>
<ul class="nav">
<li><a href="activity.php" id="defaultOpen">Activity</a></li>
<li><a href="stuprofile.php">MyProfile</a></li>
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