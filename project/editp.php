
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

if($_REQUEST['price']){	
		mysql_query("UPDATE product SET price = '$_REQUEST[price]' WHERE name='$_COOKIE[editp]'");			
		print "<script>location.href=('info.php');</script>";
}
if($_REQUEST[scribe]){	
		mysql_query("UPDATE product SET scribe = '$_REQUEST[scribe]' WHERE name='$_COOKIE[editp]'");			
		print "<script>location.href=('info.php');</script>";
}
if($_REQUEST[type]){
		mysql_query("UPDATE product SET type = '$_REQUEST[type]' WHERE name='$_COOKIE[editp]'");			
		print "<script>location.href=('info.php');</script>";
}

if($_REQUEST[name]){
		mysql_query("UPDATE product SET name = '$_REQUEST[name]' WHERE name='$_COOKIE[editp]'");
		setcookie("editp" ,"$_REQUEST[name]",time()+1800);			
		print "<script>location.href=('info.php');</script>";
}

else{

	print '
	<form action="editp.php" method="post">
	name :<input type="text" name="name"><br>
	price :<input type="text" name="price"><br>
	type: <input type="radio" name="type" value="3Ｃ產品">3Ｃ產品  <input type="radio" name="type" value="家教">家教  <input type="radio" name="type" value="參考書">參考書 <input type="radio" name="type" value="衣物">衣物 <input type="radio" name="type" value="美妝品">美妝品
	</br>
	<textarea rows="10" cols="30" name="scribe">描述商品狀況</textarea><br>
	<input type="submit" value="add product">
	</form>'; 
}

?></div>

</body>