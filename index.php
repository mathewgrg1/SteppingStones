<?php
include("admin/include/connect.php");

$m=mysql_query("select max(count) as mcount from counter");
$n=mysql_fetch_array($m);
if($n['mcount']==' ')
{
$add='1';
$sql=mysql_query("insert into counter (count) values('".$add."') ");
}
else
{
$add=$n['mcount'];
$add++;
$sql=mysql_query("update counter set count='".$add."' ");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/logo.png" type="image/png"/>
<title>Stepping Stones</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type="text/css" media="all">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

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


<script type="text/javascript">
$(document).ready(function () {
var el = $('p.blink_me');
setInterval(function() {

   el.fadeOut(250);
   el.fadeIn(250);
}, 1000);
        });
	</script>

</head>
<body>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="wrapper">
<?php
include("include/header.php");
?>
<div id="slider">
<?php
include("slider.php");
?>
</div>
<!--end of slider-->
<div id="matter" style="background-color:#FFFFFF;">
<div class="figure">
<a href="reg_login.php"><img src="images/a.jpg" alt="" style="width:290px;height:118px"></a><h2>Be a part of us</h2>
</div>

<div class="figure">
<a href="event.php"><img src="images/b.jpg" alt="" style="width:290px;height:118px"><h2></a>Events</h2>
</div>

<div class="figure">
<a href="services.php"><img src="images/c.jpg" alt="" style="width:290px;height:118px"></a><h2>Services</h2>
</div>
<div id="content">
<div id="left">
<h4 style="background-color:#FF9900; text-align:center;height:40px; line-height:40px; font-size:24px;">Welcome to Stepping Stones</h4>
								<p class="p1">Every 30 seconds 2 children become orphans.  There are more than 100 million orphans worldwide.  There are an estimated 65 million orphans in Asia alone. The project is titled ‘stepping stones’ an orphanage database management project. This project concentrates on social welfare of orphans. <br><br>This project is for managing database of orphanages as well as details about their education, extra-curricular activities etc. This also tends to attract large number of donor for large scale project. Activities will be conducted for orphans to develop their skills.<br><br>This Web project is interface between orphanages and donors. This project gives feature of adopting child and also to sponsor their education.<br><br>This project will give more exposure to orphanages, as more people will come to know about their problems and requirements.
</p></br>

<div class="box">
<div class="new" style="background:url(images/header.jpg); width:100%; height:40px; line-height:40px; text-align:center">
<p class="blink_me" style="color:#FFFFFF; font-size:28px; font-weight:600;">Urgently Required</p></div><br/>
<table border="1px" class="newtable" width="100%">
<thead>
<th>Organisation</th>
<th style="width:180px;">Requirement(Approx)</th>
<th>Donate</th>
</thead>
<tbody>
<?php
  $qry="select b.name as oname,a.urgent as urgent from orpupdate as a inner join o_details as b on a.o_id=b.id where post_req=1 and urgent!=''";
  $result=mysql_query($qry);
  if(mysql_affected_rows()==0)
  {
    ?>
  
  <tr>
  <td colspan="3">No requirements as of now...</td>
  </tr>
  <?php
  }
  while($ar=mysql_fetch_array($result))
  {
 ?>
<tr>
<td style="width:280px;"><?php echo $ar['oname'] ?></td>
<td><?php echo $ar['urgent'] ?></td>
<td style="width:180px;"><a href="donate.php">Donate</a></td>
</tr>
<?php } ?>

</tbody>
</table>
</div>

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
