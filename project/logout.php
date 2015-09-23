<html>
<head>
<style>
a {font-size:70px; color:#8a438d;}

</style>
</head>




<body background="bg.jpg">
<div style='text-align:center'>
<?php
setcookie("user", "guest", time()-1800);
//print "<script>location.href='index.php';</script>";
echo "<font size=8>";
echo "logout successfull";
echo "</font>";
?>
</div>
</body>
</html>