<?PHP
session_start();
include("include/connect.php");
if(!isset($_SESSION['orphanage']))
	{
		header("Location: index.php");
	}
$today=date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Orphanage Login</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Lukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<!-- end: CSS -->
	
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="images/logo.jpg">
	<!-- end: Favicon -->	
	<script type="text/javascript">
		function val() {
			if(updateform.ureq.value=="" && updateform.event.value=="")
			{
				alert("Atleast one of the feild should be non-empty");
				return false;
			}
			else
				return true;
		}
		function valdate()
		{
			// Create date from input value
			var inputDate = new Date(updateform.date.value);

			// Get today's date
			var todaysDate = new Date();

			// call setHours to take the time out of the comparison
			if(inputDate.setHours(0,0,0,0) < todaysDate.setHours(0,0,0,0)) 
			{
				alert("Invalid date");
			    updateform.date.focus();
			    return false;
			}
			else
				return true;
		}
	</script>	
</head>

<body>
		<!-- start: Header -->
	<?php include("include/header.php"); ?>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<?php include("include/leftlink.php"); ?>
				</div>
			</div>
			<!-- end: Main Menu -->
			<noscript>
				<div class="alert alert-block span10">
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="updates.php">Updates </a></li>
			</ul>
			<div class="row-fluid" style="min-height:900px">
			<div class="center_content">  
    		<div class="right_content">            
    	<h2>Any urgent requirements? Post to the website...</h2> 
<form action="updates.php?action=add_req" method="post" name="updateform" id="updateform">
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<tr>
		<td>Urgent requirements</td>
		<td><textarea name="ureq" required></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
<div class="clear"></div>
    </div>
    <div class="right_content"> 
    <br><br><br>           
    	<h2>Gonna organize an event? Publicize...</h2> 
<form action="updates.php?action=add_event" method="post" name="updateform" id="updateform" onsubmit="return val();">
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<tr>
		<td>Upcoming Events</td>
		<td><textarea name="event" required></textarea></td>
		</tr>
		<tr>
		<td>Venue</td>
		<td><input type="text" name="venue" required></td>
		</tr>
		<tr>
		<td>Date</td>
		<td><input name="date" type="date" required onblur="return valdate();"></td>
		</tr>
		<tr>
		<td>Time</td>
		<td><input name="time" type="time" required></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
<div class="clear"></div>
    </div>
<?php
				if(isset($_GET['action']) && ($_GET['action']=='add_event'))
				{
					$n=$_SESSION['orphanageid'];
					$ev=$_POST['event'];
					$dt=$_POST['date'];
					$ven=$_POST['venue'];
					$tm=$_POST['time'];
					$qry="insert into orpupdate (o_id,events,venue,date,time) values('$n','$ev','$ven','$dt','$tm')";
					mysql_query($qry);
					header("Location:updates.php");
				}
				if(isset($_GET['action']) && ($_GET['action']=='add_req'))
				{
					$n=$_SESSION['orphanageid'];
					$req=$_POST['ureq'];
					$qry="insert into orpupdate (o_id,urgent) values('$n','$req')";
					mysql_query($qry);
					header("Location:updates.php");
				}
?>
    

				<div class="clearfix"></div>	
			</div><!--/row-->
	</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"></button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; <a href="#" target="_blank">Stepping Stones</a> 2016</span>
		</p>

	</footer>
	<!-- start: JavaScript-->
		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>

</html>
