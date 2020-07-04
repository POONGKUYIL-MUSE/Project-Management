CREATE DATABASE `dbtuts` ;
CREATE TABLE `dbtuts`.`tbl_uploads` (
`id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`file` VARCHAR( 100 ) NOT NULL ,
`type` VARCHAR( 10 ) NOT NULL ,
`size` INT NOT NULL
) ENGINE = MYISAM ;$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbtuts";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Upload and view With PHP and MySql</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<button type="submit" name="btn-upload">upload</button>
</form>
</body>
</html>

<?php
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
 mysql_query($sql); 
}
?><table width="80%" border="1">
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $sql="SELECT * FROM tbl_uploads";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
</table>
?<php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbtuts";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
?>

<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploading With PHP and MySql</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>File Uploading With PHP and MySql</label>
</div>
<div id="body">
 <form action="upload.php" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
 }
 ?>
</div>
<div id="footer">
<label>By <a href="http://cleartuts.blogspot.com">cleartuts.blogspot.com</a></label>
</div>
</body>
</html>
<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
  mysql_query($sql);
  ?>
  <script>
  alert('successfully uploaded');
        window.location.href='index.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='index.php?fail';
        </script>
  <?php
 }
}
?>

<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploading With PHP and MySql</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>File Uploading With PHP and MySql</label>
</div>
<div id="body">
 <table width="80%" border="1">
    <tr>
    <th colspan="4">your uploads...<label><a href="index.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $sql="SELECT * FROM tbl_uploads";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    
</div>
</body>
</html>

@charset "utf-8";
/* CSS Document */

*
{
 padding:0;
 margin:0;
}
body
{
 background:#fff;
 font-family:Georgia, "Times New Roman", Times, serif;
 text-align:center;
}
#header
{
 background:#00a2d1;
 width:100%;
 height:50px;
 color:#fff;
 font-size:36px;
 font-family:Verdana, Geneva, sans-serif;
}
#body
{
 margin-top:100px;
}
#body table
{
 margin:0 auto;
 position:relative;
 bottom:50px;
}
table td,th
{
 padding:20px;
 border: solid #9fa8b0 1px;
 border-collapse:collapse;
}
#footer
{
 text-align:center;
 position:absolute;
 left:0;
 right:0;
 margin:0 auto;
 bottom:50px;
}