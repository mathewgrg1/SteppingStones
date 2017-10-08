<?php
include("include/connect.php");
session_start();
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
if(!isset($_SESSION['user']))
	header("location: user_login.php");
$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
	if($req=='notify')
	{
		$sql=mysql_query("insert into celebs(o_id,u_id,occassion,date,time,comment) values('".$_POST['ven_orp']."','".$_SESSION['user_id']."','".$_POST['occassion']."','".$_POST['date']."','".$_POST['time']."','".$_POST['comments']."')");
		phpAlert("Message sent to the orphanage. You will be intimated by the management.");
	}
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
<style type="text/css">
.text_box2{
    background: white;
    border: 1px double #DDD;
    border-radius: 5px;
    box-shadow: 0 0 5px #333;
    color: #666;
    float: left;
    padding: 5px 10px;
    width: 450px;
    outline: none;
     margin-top:10px;
     width: 70%;
}
  .tbl
  {
    background: white;
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
    color: black;
    width:50%;
  }
</style>
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
<div id="content" style="background-color:#FFFFFF;">
<br><br>
<h2 style="margin-left: 20%;">Celebrate with us</h2><br><br />
	<?php
	$req=isset($_REQUEST['mode']) ? $_REQUEST['mode'] :'';
	if($req=='details')
	{
		?>
		<div>
		<form action="celebrate.php?action=notify" method="post">
		<table class="tbl">
		<tr>
		<td>Orphanage: </td>
		<td><select class="text_box2" name="ven_orp">
		<option>--select--</option>
		<?php
		$sql=mysql_query("select id, name, address from o_details");
		while ($fetch=mysql_fetch_array($sql)) {
			?>
			<option value="<?php echo $fetch['id']; ?>"><?php echo $fetch['name']; ?>, <?php echo $fetch['address']; ?></option>
			<?php
		}
		?>
	</select></td>
		</tr>
		<tr>
		<td>Occassion: </td>
		<td><input type="text" name="occassion" class="text_box2" required></td>
		</tr>
		<tr>
		<td>Date: </td>
		<td><input type="date" name="date" class="text_box2" required></td>
		</tr>
		<tr>
		<td>Time: </td>
		<td><input type="time" name="time" class="text_box2" required></td>
		</tr>
		<tr>
		<td>Comments</td>
		<td><textarea name="comments" class="text_box2"></textarea></td>
		</tr>
		</table>
		<br><br>
		<table class="tbl">
		<tr>
		<td colspan=2><input name="Submit" type="submit" value="Okay" class="myButton"/></td>
		</tr>
		</table>
		</form><br><br><br>
		</div>
		<?php
	}
	
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
