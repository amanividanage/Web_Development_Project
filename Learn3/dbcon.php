<?php
/*connect to mysql database */
$non=mysql_connect($host,$dbuser,$dbpassword) or die("Can't connect to 
server");
mysql_select_db($dbase,$non) or die("can't connect to database");
?>
