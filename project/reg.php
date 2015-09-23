
<html>
<head>
<style>
a {font-size:70px; color:#8a438d;}

</style>
</head>

<body background="bg.jpg">
<div style='text-align:center'>
<?php
if($_REQUEST[user]){
	include "./config.inc.php";
	$result=mysql_query("SELECT * FROM `userp` WHERE user='$_REQUEST[user]'");
	if($rows=mysql_fetch_array($result,MYSQL_ASSOC)){
		print "this username has been used!!!";
	}
	else{
		print "ok";
		$r=md5($_POST[pw]);
		mysql_query("INSERT INTO userp (user,pw,name,class,fb) VALUES ( '$_REQUEST[user]','$r','$_REQUEST[name]','$_REQUEST[class]','$_REQUEST[fb]')");
	
		print "<script>location.href=('login.php');</script>";
	
	}
}
else{

	print '
	<form action="reg.php" method="post">
	student number: <input type="text" name="user"><br/>
	password: <input type="password" name="pw"><br/>
	real name:<input type="text" name="name"><br/>
	department:<input type="text" name="class"><br/>
	fb url:<input type="text" name="fb"><br/>
	<input type="submit" value="reg">
	</form>'; 
}

?>
</div>
</body>