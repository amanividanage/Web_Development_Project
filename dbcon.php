<?php
/*connect to mysql database */
$non=mysql_connect("localhost","root","") or die("Can't connect to 
server");
mysql_select_db("dbwad",$non) or die("can't connect to database");
?>
