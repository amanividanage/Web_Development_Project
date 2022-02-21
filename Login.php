<?php
session_start();
$mess="";
if(isset($_POST["submit"])) {
//conncet to the database
require_once("./dbcon/user.php");
include("./dbcon/dbcon.php"); //database connection function
$email=$_POST["email"];
$password=md5($_POST["password"]);
//retriving data from db
$query = "SELECT email FROM user_infor WHERE email = '$email' AND password = '$password'";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)) {
$email=$row["0"];
}
if(mysql_affected_rows()==0) {
$mess = "<font color=purple size=2><b>Wrong username or password.<br>Please try again.</b></font>";
} else {
$_SESSION["email"]=$email;
header("Location:./user/user1.php");
exit;
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styleew.css">
    <title>Web Development Project</title>
   
</head>

<!---------------------------------NAVIGATION BAR------------------------------------------>    
<body>
    <div class="topnav">
        
        <a href="help.html">HELP</a>
        <a href="facilities.html">FACILITIES</a>
        <a href="index.html">ABOUT US</a>
        <a href="profile.html">PROFILES</a>

        <a href="Home.html">HOME</a>
        <a href="Log.html">LOGIN</a>
        <H1 class="name">Learn@W3</H1>
    </div>

    <div class="image">

      <img src="background.jpeg" alt="zzz" width="100%">
      

  </div>
 <!-----------------------------------------------Login Form-------------------------------------------------------->
  
    <form action="action_page.php" method="post">
        <div class="container">
          <h1>Login</h1>
          <hr>
      
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
      
          
          <hr>
      
          <button type="submit" class="registerbtn">Sumbit</button>
        </div>
      
        <div class="container signin">
          <p>Haven't Registered yet? <a href="#">Register</a>.</p>
        </div>
      </form>
      </body>
      </html>