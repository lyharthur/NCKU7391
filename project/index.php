<html>
<head>
<style>
a {font-size:18px; color:#8a438d;}
th { height:50px;}
td{height:30px; vertical-align:center; padding:8px; }
</style>
</head>

<body background="bg.jpg">
<div style='text-align:center'>

<?php

if (isset($_COOKIE["user"]))
{echo "<font size=50>";
  echo "成大輕鬆交易網</br>Hello  "  . $_COOKIE["user"] . "!<br/></font>";}
else
{echo "<font size=50>";
  echo "成大輕鬆交易網</br>Hello guest!<br />";echo "</font>";}
  
  
  include "./config.inc.php";	
  echo "<font size=4><br><br><form action=\"index.php\" method=\"post\">
  <input type=\"submit\" name=\"all\" value=\"顯示全部\">
  <input type=\"submit\" name=\"type\" value=\"3Ｃ產品\">
  <input type=\"submit\" name=\"type\" value=\"家教\">
  <input type=\"submit\" name=\"type\" value=\"參考書\">
  <input type=\"submit\" name=\"type\" value=\"衣物\">
  <input type=\"submit\" name=\"type\" value=\"美妝品\">
  
  </font>";
  echo "<br>".$_REQUEST[type];
  echo "<table border='0'align='center'>
 		 <tr>
 		 <th>物品名稱</th>
 		 <th>價格</th>
 		  <th>詳細資料</th>
 		  <th>賣家資料</th>
 	
 		 </tr>";
if($_REQUEST[type])
{
$result=mysql_query("SELECT * FROM product where type='$_REQUEST[type]'");
  	while($row = mysql_fetch_array($result))
  {
  $link=mysql_query("SELECT * FROM userp WHERE user='$row[belong]'");
  $l= mysql_fetch_array($link);
  echo "<tr>";
  echo "<td>" .$row[name]."</td>";
  echo "<td>" ."$".$row[price]."</td>";
  echo "<td>" ."<a href=\"more.php?n=$row[name]&b=$row[belong]\">更多</a>"."</td>";  
  echo  "<td>"."<a href=\"userinfo.php?n=$l[user]\">$l[name]</a>"."</td>";  
  echo "</tr>";

  }
  


}  
else{  
  $result=mysql_query("SELECT * FROM product");
  	while($row = mysql_fetch_array($result))
  {
  $link=mysql_query("SELECT * FROM userp WHERE user='$row[belong]'");
  $l= mysql_fetch_array($link);
  echo "<tr>";
  echo "<td>" .$row[name]."</td>";
  echo "<td>" ."$".$row[price]."</td>";
  echo "<td>" ."<a href=\"more.php?n=$row[name]&b=$row[belong]\">更多</a>"."</td>";  
  echo  "<td>"."<a href=\"userinfo.php?n=$l[user]\">$l[name]</a>"."</td>";   
  echo "</tr>";
  }
  
  }
  
  
  
  
  
  
?>
</div>
</body>