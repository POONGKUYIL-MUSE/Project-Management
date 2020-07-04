<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  color: white;
}
.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}
.left {
  left: 0;
  background-color: yellow;
}
.right {
  right: 0;
  background-color: green;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.centered img {
  width: 150px;
  border-radius: 50%;
}
</style>
</head>
<body>
<div class="split left">
  <div class="centered">
    <img src="student1.jpeg" alt="student">
    <h2>STUDENT</h2>
    <p>Click here</p>
  </div>
</div>
<div class="split right">
  <div class="centered">
    <img src="startstaff.jpeg" alt="staff">
    <h2>STAFF</h2>
    <p>Click here</p>
  </div>
</div>
</body>
</html> 
