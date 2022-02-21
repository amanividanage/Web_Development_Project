<?php
session_start();
if(isset($_SESSION["uname"])) {
unset($_SESSION["uname"]);
}
header("Location:..Learn3/indexx.php");
exit;
?>
<html>
<head>
<title>Logged Off</title>
</head>
<body>
<br><br>
<div align="">
<h2>You are now logged off</h2>
&nbsp;&nbsp;&nbsp;
<a 
href="..Learn3/indexx.php">home</a></div>
</body> </html>
