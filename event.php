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
<style type="text/css">
  table,th,td
  {
    background: white;
    border-collapse: collapse;
    margin-left: 30%;
    padding: 10px;
    border: 1px solid black;
    color: black;
  }
</style>
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
include("admin/include/connect.php");
?>

<br><br><div style="color:#0000FF">
<br><br><br>
<table>
  <tr>
  <th>Event</th>
  <th>Venue</th>
  <th>Date</th>
  <th>Time</th>
  </tr>
  <?php
  $ev_ar=mysql_query("select events,venue,date,time from orpupdate where events!='' and post_event=1 order by date asc");
  while($fetch=mysql_fetch_array($ev_ar))
  {
  ?>
  <tr><td><?php echo $fetch['events']; ?></td>
  <td><?php echo $fetch['venue']; ?></td>
  <td><?php echo $fetch['date']; ?></td>
  <td><?php echo $fetch['time']; ?></td></tr>
<?php
}
?>
</table>
</div><br><br>
<?php
include("include/footer.php");
?>
</div>
<!--end of wrapper-->
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>