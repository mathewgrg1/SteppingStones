<?php
include("include/connect.php");
session_start();
error_reporting(0);
if(isset($_SESSION['user']))
	header("Location: index.php");
?>


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
include("include/header.php");
?>
<div id="slider">
<!-- <img src="images/bg_top_img3.jpg" /> -->
</div>
<!--end of slider-->
<div id="matter" style="background-color:#FFFFFF;">
<div id="content" style="background-color:#FFFFFF; padding-bottom:20px;">
<article class="col1" style="margin-left: 120px;width:700px; float:left;">
						
		<form id="ContactForm" action="ulogin_exec.php" enctype="multipart/form-data" onSubmit="return validateform();" method="post">
		<br /><br /><br /><br /><br /><br /><br /><br />
		<h2>User Login</h2><br><br />
				<table width="100%" align="center">

<tr><td class="tex_td">Email</td>
<td><input name="Email_id" id="email" class="text_box2" type="email" maxlength="40" required /></td></tr>

<tr><td class="tex_td">Password</td>
<td><input name="p_word" id="email" class="text_box2" type="password" maxlength="20" required /></td></tr>

</table>
<br />
<div style="text-align:center;">


<input name="Submit" type="submit" value="Login" class="myButton"/>
<a href="user_register.php" class="myButton"/>Signup</a><br>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
									
								</form>
					</article>
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

