<?php
session_start();
if(!isset($_SESSION["uname"])) {
header("Location:..Learn3/error.html");
exit;
}
$mess = "";
if(isset($_GET["uname_d"])) {
/*Connect to MySQL database*/
include("../Learn3/user.php"); //host name,user name,password include here
require_once("../Learn3/dbcon.php"); //connection build up here
$user_name=$_GET["uname_d"];
$query2 = "DELETE FROM user_info WHERE user_name = '$user_name'";
$result2 = mysql_query($query2);
if(!$result2) {
$err=mysql_error();
print $err;
exit();
}
$mess = "<font color='blue'><b>Information has been deleted.</b></font>";
}
?>

<html> <head>
<title>View User Information</title>
<script type="text/javascript">
function delete_test() {
return confirm("Do you want to delete these information");
}
</script>
</head> <body>
<h2>View of User Information</h2>
<?php
echo "$mess<br>";
?>
<?php
/*Connect to MySQL database*/
include("../Learn3/user.php");
require_once("../Learn3/dbcon.php");
/*Execute SQL command*/
$query = "SELECT first_name, last_name, id, gender, district, email_address, email_notification, user_name FROM
user_info";
$result=mysql_query($query);
/* Output results as HTML table */
echo "<table border=1 width=140%>\n";
/* Output field names as table header */
echo "<caption><font >User Information</font></caption>
<tr>
<th width='20%'>FIRST NAME</th>
<th width='20%'>LAST NAME</th>
<th width='10%'>IDENTITY NO</th>
<th width='10%'>GENDER</th>
<th width='10%'>DISTRICT</th>
<th width='20%'>E-MAIL</th>
<th width='10%'>SEND E-MAIL NOTIFICATIONS</th>
</tr>";
while($myrow=mysql_fetch_row($result)) {
    echo "<tr>";
    for($f=0;$f<mysql_num_fields($result)-1;$f++) {
    echo "<td>&nbsp;".htmlspecialchars($myrow[$f]);
    }
    echo "<td width='5%' align='center'><a href='..Learn3/edit_user_info.php?uname=".urlencode($myrow[7])."'>edit</a>";
    echo "<td width='5%' align='center'><a onClick='return delete_test()' href='?uname_d=".urlencode($myrow[7
    ])."'>delete</a>";
    }
    echo "</table>\n";
    echo "<a href='../Learn3/user1.php'>back to home</a>";
    ?>
    </body>
    </html