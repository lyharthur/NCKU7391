



<html>
<head>
<style>
a1 {font-size:30px; color:#8a438d;}
a {font-size:18px; color:#8a438d;}
th { height:50px;}
td{height:30px; vertical-align:center; padding:8px; }
</style>
</head>
<body background="bg.jpg">
<div style='text-align:center'>
<?php
include "./config.inc.php";


echo "<br><br><br><br><br><table border='0'align='center' text-align='center'>
 		 <tr>
 		 <th>物品名稱</th>
 		 <th>價格</th>
 		 <th>物品分類</th>
 		 <th>描述</th>
 		 </tr>";
 
 $result=mysql_query("SELECT * FROM product where belong='$_GET[b]' AND name='$_GET[n]'");
 while($row = mysql_fetch_array($result))	
  	{
  	$link=mysql_query("SELECT * FROM userp WHERE user='$row[belong]'");
  $l= mysql_fetch_array($link);  echo "<tr>";
  echo "<td>" .$row[name]."</td>";
  echo "<td>" ."$".$row[price]."</td>";
  echo "<td>" .$row[type]."</td>";
  echo "<td>" .$row[scribe]."</td>";

  	echo "</tr>";
  	//echo "$row[lat]"."$row[lng]";
	 echo "<br><a href=\"userinfo.php?n=$l[user]\">$l[name]</a>";
	
echo "<table border='0'align='center' text-align='center'><tr><th>物品所在地</th></tr>
";
echo "<tr><td><iframe width=\"475\" height=\"400\" frameborder=\"0\" scrolling=\yes\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com.tw/maps?q=$row[lat]++$row[lng]&amp;hl=zh-TW&amp;brcurrent=3,0x346e76a23a911b13:0x40790d91bd4b5e02,0,0x346e7ccc953ffe13:0xd47f4caaa5dc764e&amp;t=m&amp;ie=UTF8&amp;z=15&amp;ll=$row[lat],$row[lng]&amp;output=embed\"></iframe><br />";
echo "</td></tr>";
}

?>
</div>
</body>
</html>