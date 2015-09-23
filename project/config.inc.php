<?php

$host="localhost";
$user="root";
$upwd=""; // 123
$db="project";

$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_select_db($db, $link) or die ("Unable to select database!");

?>

