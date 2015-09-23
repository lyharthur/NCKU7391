<?php
	include_once "./config.inc.php";
	ini_set( 'memory_limit', '512M' );

$fileInfo = getimagesize($_FILES['file']['tmp_name']);
$imgType=$fileInfo[2];
$typeJPG=2; //jpg的代號為2
$typePNG=3; //png的代號為3
if($imgType != $typeJPG && $imgType!= $typePNG){ header("location:upload.php?error=1"); exit;}
print '<br>圖片類型為：'.$imgType.'<br>';
?>

<a href="upload.php">回到上傳頁面</a><br>
<a href="display.php">顯示圖片</a>
<?php

if($imgType == $typeJPG)
	$src = imagecreatefromjpeg($_FILES['file']['tmp_name']);
else if ($imgType == $typePNG)
	$src = imagecreatefrompng($_FILES['file']['tmp_name']);


$src_w = imagesx($src);
$src_h = imagesy($src);

if($src_w > 200 || $src_h > 200){
	if($src_w > $src_h){
	$small_w = 200;
	$small_h = intval($src_h / $src_w * 200);
	}else{
	$small_h = 200;
	$small_w = intval($src_w / $src_h * 200);
	}
} else {
	$small_w = $src_w;
	$small_h = $src_h;
}


$small = imagecreatetruecolor($small_w, $small_h);


imagecopyresampled($small, $src, 0, 0, 0, 0, $small_w, $small_h, $src_w, $src_h);

//print date("Y-m-d H:i:s");;
$year = date("Y");
$month = date("m");
$day = date("d");
$hour = date("H");
$minute = date("i");
$second = date("s");
$imgName = $year.$month.$day.$hour.$minute.$second.rand(100000,999999);
$namename = 123;
print $various.'<br>';


if($imgType == $typeJPG)	$imgName=$imgName.".jpg";
else if ($imgType == $typePNG)	$imgName=$imgName.".png";


if($imgType == $typeJPG) imagejpeg($small, "img_s/".$imgName);
else if ($imgType == $typePNG) imagepng($small, "img_s/".$imgName);


copy($_FILES['file']['tmp_name'], "img/" . $imgName); 



$img_o="img/".$imgName;
$img_s="img_s/".$imgName;


$uid=$_COOKIE[uid];
mysql_query("INSERT INTO `test`.`img` ( `uid`, `name`, `filename`, `text`, `year`, `month`, `day`, `hour`, `minute`) 
								VALUES ( '$uid', '$_POST[name]', '$imgName', '$_POST[content]', '$year', '$month', '$day', '$hour', '$minute');",$link
);

print '原圖<br><img src="'.$img_o.'"><br>';
print '小圖<br><img src="'.$img_s.'"><br>';
?>