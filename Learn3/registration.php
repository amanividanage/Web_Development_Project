<?php
$mess = "";
if(isset($_POST["submit"])) {
//conncet to the database
require_once("../Learn3/user.php");
include("../Learn3/dbcon.php"); //database connection function
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$id=$_POST["id"];
if(isset($_POST["gender"])) {
$gender=$_POST["gender"];
}
$district=$_POST["district"];
$email=$_POST["email"];
if(isset($_POST["notification"])) {
$notification='Y';
} else {
$notification='N';
}
$username=$_POST["username"];
$password=md5($_POST["password"]);
$password_conf=md5($_POST["password_conf"]);
if($password!=$password_conf) {
$mess="<font color='red'>Password and confirmation doesn't match.</font>";
exit;
}

$query = "INSERT INTO user_infor(first_name, last_name, id, gender, district, email_address, email_notification,
user_name, password) VALUES
('$first_name', '$last_name', '$id', '$gender', '$district', '$email', '$notification', '$username', '$password')";
$result = mysql_query($query);
if(!$result) {
$error = mysql_error();
print $error;
exit;
}
$mess = "<font color='blue'>User Successfully Created</font>";
}
?>

<html>
<head>
<title>User Registration</title>
<script language="javascript">
<!--
function testform() {
if(document.user.first_name.value=='') {
alert("Please enter your first name");
return false; }
if(document.user.id.value=='') {
alert("Please enter your id number");
return false; }
if(document.user.email.value=='') {
alert("Please enter your email address");
return false; }
if(document.user.username.value=='') {
alert("Please enter your username");
return false; }
if(document.user.password.value=='') {
alert("Please enter your password");
return false; }
if(document.user.password_conf.value=='') {
alert("Please enter confirm password");
return false; }
if(document.user.password.value!=document.user.password_conf.value) {
alert("Password and confirmation does not match");
return false; }
return confirm("Do you want to register?");
}
-->
</script>

</head>
<body>
<center>
<?php
echo $mess;
?>
<form name="user" method="post" action="" onSubmit="return testform()">
<table width="40%" bgcolor="silver">
<caption><font size="5"><b>Registration Form</b></font></caption>
<br>
<tr>
<td>
<br><br>
<b>FIRST NAME:</b><br>
<input type="text" name="first_name" size="50" maxlength="60"><br><br>
<b>LAST NAME:</b><br>
<input type="text" name="last_name" size="50" maxlength="60"><br><br>
<b>IDENTITY NO:</b><br>
<input type="text" name="id" size="10" maxlength="10" align="right"><br><br>
<b>GENDER:</b><br>
<input type="radio" name="gender" value="Male"> &nbsp; Male
<input type="radio" name="gender" value="Female"> &nbsp; Female
<br><br>
<b>DISTRICT:</b><br>
<select name="district">
<option SELECTED>Colombo</option>
<option>Gampaha</option>

<option>Kalutara</option>
</select><br><br>

<b>E-MAIL:</b><br>
<input type="text" name="email" size="50" maxlength="60"><br><br>
<b>SEND E-MAIL NOTIFICATIONS:</b><br>
<input type="checkbox" name="notification" value="send"><br><br>
<b>USER NAME:</b><br>
<input type="textbox" name="username" size="20"><br><br>
<b>PASSWORD:</b><br>
<input type="password" name="password" size="20" maxlength="20"><br><br>
<b>CONFIRM PASSWORD:</b><br>
<input type="password" name="password_conf" size="20" maxlength="20"><br><
<hr width="90%" color="black"><br>
<div align=right>
<input type="submit" name="submit" value=" Submit ">
&nbsp;&nbsp;
<input type="reset" name="reset_s" value="Cancel">
</div>
</td>
</tr>
</table>
</center>
</form>
</body>
</html>
