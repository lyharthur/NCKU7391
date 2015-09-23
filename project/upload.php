<?php
	include_once "./config.inc.php";
?>

<form method="post" enctype="multipart/form-data" action="work.php" >
	檔案上傳：<input name="file" type="file"><br>
	<input name="upload" type="submit" value="上傳">
</form>
<a href="display.php">顯示商品</a>
<?php
	if($_GET[error] == 1) print '圖片類型錯誤!!';
?>

