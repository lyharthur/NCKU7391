
<html>
<head>
<style>
a {font-size:70px; color:#8a438d;}

</style>
</head>

<body background="bg.jpg">
<div style='text-align:center'>
<?php
include "./config.inc.php";
if($_REQUEST[name]){
		mysql_query("UPDATE userp SET name = '$_REQUEST[name]' WHERE user='$_COOKIE[user]'");			
		print "<script>location.href=('info.php');</script>";
}
if($_REQUEST['class']){
		mysql_query("UPDATE userp SET class = '$_REQUEST[class]' WHERE user='$_COOKIE[user]'");			
		print "<script>location.href=('info.php');</script>";
}
if($_REQUEST[fb]){
		mysql_query("UPDATE userp SET fb = '$_REQUEST[fb]' WHERE user='$_COOKIE[user]'");			
		print "<script>location.href=('info.php');</script>";
}
if($_REQUEST[self]){
		mysql_query("UPDATE userp SET self = '$_REQUEST[self]' WHERE user='$_COOKIE[user]'");			
		print "<script>location.href=('info.php');</script>";
}

else{

	print '
	<form action="edit.php" method="post">
	realname:<input type="text" name="name"><br/>
	department:<input type="text" name="class"><br/>
	fb url:<input type="text" name="fb"><br/>
	<textarea rows="10" cols="30" name="self">哈摟大家好</textarea>
	<input type="submit" value="edit">
	</form>'; 
}

?></div>

</body>