<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/logo.png" type="image/png"/>
<title>Stepping Stones</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type="text/css" media="all">
<link rel="stylesheet" href="othercss.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">
	.bg, .box2 {behavior:url(js/PIE.htc)}
</style>
<![endif]-->
<!--[if lt IE 7]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode">
		<img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
	</div>
<![endif]-->
</head>
<body>
<div id="wrapper">
<?php
session_start();
include("include/header.php");
?>
<div id="slider">
<!-- <img src="images/bg_top_img3.jpg" /> -->
</div>
<!--end of slider-->
<div id="matter">
<div id="content" style="background-color:#FFFFFF;">

<div class="contact">
<center><img src="images/donate.png" style="width: 150px; height: 150px;"></center>
<br>
<br>
<hr>
<br>
<span style= "font-family: timesnew roman; font-size: 25px"><center><p><a href="donate.php">Donate</a></p></center></span>
 <br>
<br>
<br>
 </div>
 <div class="contact">
<center><img src="images/adopt.jpg" style="width: 150px; height: 150px;"></center>
<br>
<br>
<hr>
<br>
<span style= "font-family: timesnew roman; font-size: 25px"><center><p><a href="adopt.php">Adopt a child</a></p></center></span>
 <br>
<br>
<br>
 </div>

<div class="contact">
<center><img src="images/educate.jpg" style="width: 150px; height: 150px;"></center>
<br>
<br>
<hr>
<br>
<span style= "font-family: timesnew roman; font-size: 25px"><center><p><a href="educate.php">Educate a child</a></p></center></span>
<br>
<br>
<br>
</div>

<div class="contact">
<center><img src="images/celebrate.jpg" style="width: 150px; height: 150px;"></center>
<br>
<br>
<hr>
<br>
<span style= "font-family: timesnew roman; font-size: 25px"><center><p><a href="celebrate.php?mode=details">Celebrate with us</a></p></center></span>
<br>
<br>
<br>
</div>
</div>
<!--end of content-->
</div>
<!--end of matter-->
<?php
include("include/footer.php");
?>
</div>
<!--end of wrapper-->
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
