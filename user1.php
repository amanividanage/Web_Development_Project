<?php
session_start();
if(!isset($_SESSION["email"])) {
header("Location: ../error.html");
exit;
}
?>
<html>
<head>
<title>User Page</title>
</head>
<body>
<center>
You are successfully logged In.
<br><br>
<a href="logoff.php">Log Out</a>
</center>
</body>
</html>