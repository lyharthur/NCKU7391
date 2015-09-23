<html>
<head>
<style>
a {font-size:70px; color:#8a438d;}

</style>
</head>

<body background="bg.jpg">
<div style='text-align:center'>
<?php

include_once "./func.php";

if($_REQUEST[user]){
	$r=md5($_POST[pw]);
	//print "logging<br/>";
	//echo $r."<br/>";
	if(vaild($_POST[user],$r)){
	setcookie("user" ,"$_POST[user]",time()+1800);
	
	print "logged in"."<br>";
		//echo $_POST[user]."<br>";
		//echo $_POST[pw]."<br>";
		print "<script>location.href='index.php';</script>";
		exit;
	}
	else{
		print "logged failed";
	}
}login($_REQUEST[url]);


?>
</div>
</body>