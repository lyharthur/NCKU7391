
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
		if(isset($_COOKIE["user"])){
		
		$v=$_COOKIE["user"];
		$result=mysql_query("SELECT * FROM userp WHERE user='$v'");		
	echo "Welcome " . $_COOKIE["user"] . "!<br /><br />". "基本資料:<br>" ;
	while($row = mysql_fetch_array($result))
  {
  echo "Studentnumber: " .$row['user'] . "<br>" . "Name: " .$row['name']. "<br>" . "系級:" . $row['class']. "<br>"  ."自我介紹: " . $row['self'] . "<br>"  . "<a1><a  href=\"$row[fb]\"target=\"_blank\">Facebook Link</a></a1></br></br>" . "<a href=\"edit.php\" target=\"main\">編輯基本資料</a></br>";
  echo "<br/>";
  }
 echo "<table border=''align='center' text-align='center'>
 		 <tr>
 		 <th>商品名稱</th>
 		 <th>價格</th>
 		 <th>商品分類</th>
 		 <th>描述</th> 
 		 <th>下架</th>		 
 		 </tr>";
  $prod=mysql_query("SELECT * FROM product WHERE belong='$v'");
  while($p = mysql_fetch_array($prod))
	{
  echo "<tr>";
  echo "<td>" .$p[name]."</td>";
  echo "<td>" ."$".$p[price]."</td>";
  echo "<td>" .$p[type]."</td>";
  echo "<td>" .$p[scribe]."</td>";
  echo"<td><br>
	<form action=\"info.php\" method=\"post\">	
	<input type=\"submit\" name=\"dd\" value=\"$p[name]\">
	</form><br/></td>";
  
  
  
  
  
  //echo "<td>"."<a href=\"editp.php\" target=\"main\">edit</a></br>"."</td>";
  echo "</tr>";
	  
	}
  if($_REQUEST[name]){
 setcookie("editp" ,"$_POST[name]",time()+1800);

		print "<script>location.href=('editp.php');</script>";
 
 }
 else{
  print '<a href="addp.php" target="main">上架商品</a></br></br>
	<form action="info.php" method="post">
	要編輯的物品名:<input type="text" name="name">
	<input type="submit" value="edit">
	</form></br>';  
	}
	
	if($_REQUEST[dd]){
	mysql_query("DELETE FROM product WHERE  belong='$_COOKIE[user]' AND name='$_REQUEST[dd]'");
	
	print "<script>location.href=('info.php');</script>";
	}
	
	}	
	else{
		echo "<script> alert('please login first!!!!!!!!') </script>";
		print "<script>location.href=('index.php');</script>";
	}

?>



</br></br>

</div>
</body>