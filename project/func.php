<?php

function vaild($users,$pws){
	if($users and $pws){
		include "./config.inc.php";
		$result=mysql_query("SELECT * FROM `userp` WHERE user='$users'",$link);
		if($rows=mysql_fetch_array($result,MYSQL_ASSOC)){
			if($rows[pw] == $pws){
     		   return 1;
			}
		}
	}
	return 0;
}
function login($url){
	print '
	<form action="login.php" method="post">
	student number: <input type="text" name="user"><br/>
	password: <input type="password" name="pw">
	<input type="hidden" name="url" value="'.$url.'">
	<input type="submit" value="login"><br/>
	</form>'; 
	exit;
}
?>
