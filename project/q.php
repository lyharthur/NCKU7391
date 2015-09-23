
<?php

if($_GET[q]!=null){
	include_once "./config.inc.php";
	$result=mysql_query("SELECT name FROM `product` WHERE name LIKE '$_GET[q]%' LIMIT 10",$link);
	$t=1;
	while($rows=mysql_fetch_array($result,MYSQL_ASSOC)){
		if($t==0)	print "|";
		else		$t=0;
		print $rows[name];
	}
}
?>
