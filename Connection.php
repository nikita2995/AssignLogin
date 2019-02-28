<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='assign_login';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
mysqli_select_db($conn, $db);
?>

