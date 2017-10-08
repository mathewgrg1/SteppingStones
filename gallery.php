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

<script type="text/javascript" src="jss/jquery-1.6.min.js"></script>
<script src="jss/cufon-yui.js" type="text/javascript"></script>
<script src="jss/cufon-replace.js" type="text/javascript"></script>
<script src="jss/Open_Sans_400.font.js" type="text/javascript"></script>
<script src="jss/Open_Sans_Light_300.font.js" type="text/javascript"></script>
<script src="jss/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>
<script src="jss/FF-cash.js" type="text/javascript"></script>
<script type="text/javascript" src="jss/jquery.min.js"></script> 
	
   <link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
    
	<script type="text/JavaScript" src="jss/slimbox2.js"></script> 

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
$query=mysql_query("select * from gallery");
while($fetch=mysql_fetch_array($query))
{
?>
<div class="gimg">
<a href="admin/image/<?php echo $fetch['imgPath_home'];  ?>" rel="lightbox[gallery]">
<img src="admin/image/<?php echo $fetch['imgPath_home'];  ?>" style="width:100px;height:100px"></a>
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