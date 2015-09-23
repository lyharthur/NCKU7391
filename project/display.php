<?php
	include_once "./config.inc.php";
?>


<?php 
	$getImg = "SELECT * FROM  `img` ,$link";
	$result = mysql_query($sql,$link);
	
	if(!$getImg)
	{
		die("無法開啟myDataBase<br>".mysql_error($link));
	}
		echo "成功開啟myDataBase";
		
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
	{
    printf("ID: %s  Name: %s", $row["id"], $row["filename"]);
	}	
	print '<img src="img/'.$data.'"></img></a>';
?>

		