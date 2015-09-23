
<body background="bg.jpg">

<div style='text-align:center'>
<?php
include_once "./config.inc.php";
echo "<br><br><br> 搜尋結果：";
 echo "<table border='0'align='center'>
 		 <tr>
 		 <th>商品名稱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 		 <th>價格&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 		  <th>描述&nbsp;&nbsp;&nbsp;&nbsp;</th>
 		  <th>賣家FB          </th>
 		 </tr>";
$result=mysql_query("SELECT * FROM `product` WHERE name LIKE '$_GET[q]%' LIMIT 1",$link);
while($rows=mysql_fetch_array($result,MYSQL_ASSOC))
{
	 $link=mysql_query("SELECT * FROM userp WHERE user='$rows[belong]'");
     $l= mysql_fetch_array($link);	
	 echo "<tr>";
  echo "<td>" .$rows[name]."</td>";
  echo "<td>" ."$".$rows[price]."</td>";
  echo "<td>" ."<a href=\"more.php?n=$row[name]&b=$row[belong]\">更多</a>"."</td>";  
  
  echo  "<td>"."<a  href=\"$l[fb]\"target=\"_blank\">$l[name]</a>"."</td>";
  
  
  echo "</tr>";
}
?>
</div>
</body>