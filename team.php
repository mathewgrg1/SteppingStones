<?php
include("admin/include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/logo.png" type="image/png"/>
<title>Stepping Stones</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
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
<div id="matter">
<div id="content">
<div id="left">
<?php
$query=mysql_query("select * from team_member order by id");
while($fetch=mysql_fetch_array($query))
{
?>
<div class="gimgnew">
<img src="admin/image/<?php echo $fetch['imgPath_home'];  ?>" style="width:100px;height:140px"><br/>
 <center><?php echo $fetch['name'];  ?><br/>
(<?php echo $fetch['designation'];  ?>)</center>
</div>
<?php
}
?>
</div>
<!--end of left-->
<?php
include("include/right.php");
?>
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
