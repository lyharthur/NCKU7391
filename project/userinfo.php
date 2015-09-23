
<html>
<head>
<style>
a1 {font-size:30px; color:#8a438d;}
a {font-size:18px; color:#8a438d;}
th { height:20px;}
td{height:20px; vertical-align:center; padding:8px; }
</style>
</head>

<body background="bg.jpg">
<div style='text-align:center'>

<?php
include "./config.inc.php";	
		
		
	
		$result=mysql_query("SELECT * FROM userp WHERE user='$_GET[n]'");		
	echo  "<br /><br />". "賣家資料:<br>" ;
	while($row = mysql_fetch_array($result))
  {
  echo "Studentnumber: " .$row['user'] . "<br>" . "Name: " .$row['name']. "<br>" . "系級:" . $row['class']. "<br>"  ."自我介紹: " . $row['self'] . "<br>"  . "<a1><a  href=\"$row[fb]\"target=\"_blank\">Facebook Link</a></a1></br></br>" ;
  echo "<br/>";
  }
 echo "<table border=''align='center' text-align='center'>
 		 <tr>
 		 <th>商品名稱</th>
 		 <th>價格</th>
 		 <th>商品分類</th>
 		 <th>詳細資料</th> 
 		 		 
 		 </tr>";
  $prod=mysql_query("SELECT * FROM product WHERE belong='$_GET[n]'");
  while($p = mysql_fetch_array($prod))
	{
  echo "<tr>";
  echo "<td>" .$p[name]."</td>";
  echo "<td>" ."$".$p[price]."</td>";
  echo "<td>" .$p[type]."</td>";
echo "<td>" ."<a href=\"more.php?n=$p[name]&b=$p[belong]\">更多</a>"."</td>";    
  
  
  
  
  //echo "<td>"."<a href=\"editp.php\" target=\"main\">edit</a></br>"."</td>";
  echo "</tr>";
	  
	}

	
?>



</br></br>

</div>
</body>