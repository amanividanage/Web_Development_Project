<?php
session_start();
if(!isset($_SESSION["uname"])) {
header("Location:..Learn3/error.html");
exit;
}
$mess = "";
if(isset($_POST["submit"])) {
include("../Learn3/user.php");
require_once("../Learn3/dbcon.php");
$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$id = $_POST["id"];
if(isset($_POST["gender"])) {
$gender = $_POST["gender"];
}
$district = $_POST["district"];
$email = $_POST["email"];
if(isset($_POST["email_notification"])) {
$email_notification = "Y";
} else {
$email_notification = "N";
}

$user_name = $_POST["user_name"];
$query2 = "UPDATE user_infor SET first_name='$fname',last_name='$lname',id='$id',gender='$gender',
district='$district',email_address='$email',email_notification='$email_notification' WHERE user_name = '$user_name'";
$result2 = mysql_query($query2);
if(!$result2) {
$err=mysql_error();
print $err;
exit();
} 
echo "<font color='blue'><b>Information has been entered.</b></font>"; 
echo "<br>";
echo "<a href='../Learn3/view_user_info.php'>back</a>";
exit;
} 
?>


<html>
<head>
<title>Edit User information</title>
<script type="text/javascript">
function test_form2() {
if(document.user.first_name.value=='') {
alert("Please enter your first name");
return false;
}
if(document.user.id.value=='') {
alert("Please enter your id number");
return false;
}
if(document.user.email.value=='') {
alert("Please enter your email address");
return false;
}
return confirm("Do you want to update?");
}
</script>
</head>

<body>
<?php
echo $mess;
?>
<?php
if(isset($_GET["uname"])) {
include("../Learn3/user.php");
require_once("../Learn3/dbcon.php");
$uname = $_GET["uname"];
$query="SELECT first_name, last_name, id, gender, district, email_address, email_notification FROM 
user_info WHERE user_name = '$uname'";
$result=mysql_query($query);
if(!$result) {
print mysql_error();
exit(); 
}
while($row=mysql_fetch_array($result)) {
$first_name = $row["first_name"];
$last_name = $row["last_name"];
$id = $row["id"];
$gender = $row["gender"];
$district = $row["district"];
$email_address = $row["email_address"];
$email_notification = $row["email_notification"];
}
?>
<center>
<h2>Edit User Information</h2>
<form name="admin_edit" method="post" action="" onSubmit="return test_form2()">
<table width="40%" bgcolor="silver">
<caption><font size="5"><b>Edit User Information</b></font></caption>
<br>
<tr>
<td>
<br><br>
<b>FIRST NAME:</b><br>
<input type="text" name="first_name" size="50" maxlength="60" value="<?php echo $first_name; ?>"><br><br>
<b>LAST NAME:</b><br>
<input type="text" name="last_name" size="50" maxlength="60" value="<?php echo $last_name; ?>"><br><br>
<b>IDENTITY NO:</b><br>
<input type="text" name="id" size="10" maxlength="10" align="right" value="<?php echo $id; ?>"><br><br>
<b>GENDER:</b><br>
<input type="radio" name="gender" value="Male" <?php if($gender == "Male") echo "CHECKED"; ?>> &nbsp; Male
<input type="radio" name="gender" value="Female" <?php if($gender == "Female") echo "CHECKED"; ?>> &nbsp; Female
<br><br>
<b>DISTRICT:</b><br>
<select name="district">
<option <?php if($district == "Colombo") echo "SELECTED"; ?>>Colombo</option>
<option <?php if($district == "Gampaha") echo "SELECTED"; ?>>Gampaha</option>
<option <?php if($district == "Kalutara") echo "SELECTED"; ?>>Kalutara</option>
</select><br><br>
<b>E-MAIL:</b><br>
<input type="text" name="email" size="50" maxlength="60" value="<?php echo $email_address; ?>"><br><br>
<b>SEND E-MAIL NOTIFICATIONS:</b><br>
<input type="checkbox" name="email_notification" value="send" <?php if($email_notification == "Y") echo "CHECKED"; ?> ><br><br>
<input type="hidden" name="user_name" value="<?php echo $uname; ?>">
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
<?php
}
?>
</body>
</html>
