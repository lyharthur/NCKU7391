<body background="bg.jpg">
<div style='text-align:center'>
<?php
include_once "./func.php";


if(isset($_COOKIE["user"])){
if($_REQUEST[name]){
	include "./config.inc.php";
	$result=mysql_query("SELECT * FROM `product` WHERE name='$_REQUEST[name]'");
		if($rows=mysql_fetch_array($result,MYSQL_ASSOC))
		{print "the same product";print "<script>location.href=('addp.php');</script>";}
		else{
	
	
	mysql_query("INSERT INTO  product(belong,name,price,type,scribe,lat,lng) VALUES ('$_COOKIE[user]','$_REQUEST[name]','$_REQUEST[price]','$_REQUEST[type]','$_REQUEST[scribe]','22.9966097','120.22040609999999')");	

		setcookie("namemap" ,"$_REQUEST[name]",time()+1800);
		//echo $_POST[web]."<br>";		
		print "<script>location.href=('map.php');</script>";
		}
	
	
}
else{
	print '
	增加商品
	</br></br></br></br>
	<form action="addp.php" method="post">
	product name : <input type="text" name="name"><br>
	price :<input type="text" name="price"><br>
	type: <input type="radio" name="type" value="3Ｃ產品">3Ｃ產品  <input type="radio" name="type" value="家教">家教  <input type="radio" name="type" value="參考書">參考書 <input type="radio" name="type" value="衣物">衣物 <input type="radio" name="type" value="美妝品">美妝品
	</br>
	<textarea rows="10" cols="30" name="scribe">描述商品狀況</textarea><br>
	<input type="submit" value="下一步">
	</form>'; 
}
}
else{
		echo "<script> alert('please login first!!!!!!!!') </script>";
		print "<script>location.href=('index.php');</script>";
	}

?></div>
</body>
