<!DOCTYPE html>
<html>
<head>
<title>map</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta charset="utf-8">
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0 20%; padding: 0px }
  #map_canvas { height: 100% }
</style>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  var map;
  var marker;
   
  function initialize() 
  {
	//初始化地圖時的定位經緯度設定
    var latlng = new google.maps.LatLng(22.9966097,120.22040609999999); //成大
 
    //初始化地圖options設定
	var mapOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      
    };
	//初始化地圖
    map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
	//加入標記點
	marker = new google.maps.Marker({
		  draggable:true,
		  position: latlng,
		  title:"商品",
		  map:map
	});	
	//增加標記點的mouseup事件
	google.maps.event.addListener(marker, 'mouseup', function() {
		LatLng = marker.getPosition();
		$("#NowLatLng").html("【標記點的位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());
	});
	
  }
  
  function GetAddressMarker()
  {//重新定位地圖位置與標記點位置
	 address = $("#address_val").val();
	 geocoder = new google.maps.Geocoder();
	 geocoder.geocode(
		 {
		  'address':address
		 },function (results,status) 
		 {
			if(status==google.maps.GeocoderStatus.OK) 
			{
			   
			   LatLng = results[0].geometry.location;
			   map.setCenter(LatLng);		//將地圖中心定位到查詢結果
			   marker.setPosition(LatLng);	//將標記點定位到查詢結果
			   marker.setTitle(address);	//重新設定標記點的title
			
			   $("#NowLatLng").html("【您輸入的地址位置】緯度：" + LatLng.lat() + "  經度：" + LatLng.lng());
			}
		 }
	 ); 
  }
  
  $(document).ready(function() { 
	
	$("#address_val").bind("keyup",function(){	
		GetAddressMarker();
		$("#NowLatLng").html("【標記點的位置】");
	});	
  });
  
  
  </script>
</head>
<body onload="initialize()" background="bg.jpg">  




  
  <div style="height:150;">1.先輸入地址或移動標記來取得經緯度
	<div>地址：<input type="text" id="address_val" name="address_val" style="width:400px;"></div>
	<div id="NowLatLng">【標記點的位置】</div>
  </div>
  <div id="map_canvas" style="height:70%;"></div>  
<?php 
include "./config.inc.php";
echo $_COOKIE[namemap];

if($_REQUEST[lat]&$_REQUEST[lng])
{
		mysql_query("UPDATE product SET lat = '$_REQUEST[lat]'WHERE name = '$_COOKIE[namemap]' ");			
		mysql_query("UPDATE product SET lng = '$_REQUEST[lng]'WHERE name = '$_COOKIE[namemap]' ");
		print "<script>location.href=('index.php');</script>";
		
}
else{
print '
<form action="map.php" method="post">
	2.輸入物品的位置  緯度:<input type="text" name="lat">
	經度:<input type="text" name="lng">
    <input type="submit" value="ok">
	</form>'; 
   }
  
  
?>  
</body>
</html>