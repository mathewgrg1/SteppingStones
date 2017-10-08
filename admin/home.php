<?PHP
session_start();
include("include/connect.php");

	if(!isset($_SESSION['admin']))
	{
		header("Location:index.php");
	}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';

	if($req=='del_msg')
	{
		$qry="delete from contactdet where id=". $_GET['id'];
		mysql_query($qry);
		header("Location: home.php?Message_Deleted");
	}
	if($req=='del_event')
	{
		$qry="update orpupdate set events='' where upd_id=". $_GET['id'];
		mysql_query($qry);
		mysql_query("delete from orpupdate where urgent='' and events=''");
		header("Location: home.php?Event_Deleted");
	}
	if($req=='del_req')
	{
		$qry="update orpupdate set urgent='' where upd_id=". $_GET['id'];
		mysql_query($qry);
		mysql_query("delete from orpupdate where urgent='' and events=''");
		header("Location: home.php?Requirement_Deleted");
	}
	if($req=='post_req')
	{
		$qry="update orpupdate set post_req=1 where upd_id=". $_GET['id'];
		mysql_query($qry);
		header("Location: home.php?Requirement_Posted");
	}
	if($req=='unpost_req')
	{
		$qry="update orpupdate set post_req=0 where upd_id=". $_GET['id'];
		mysql_query($qry);
		header("Location: home.php?Requirement_Post_Removed");
	}
	if($req=='post_event')
	{
		$qry="update orpupdate set post_event=1 where upd_id=". $_GET['id'];
		mysql_query($qry);
		header("Location: home.php?Event_Posted");
	}
	if($req=='unpost_event')
	{
		$qry="update orpupdate set post_event=0 where upd_id=". $_GET['id'];
		mysql_query($qry);
		header("Location: home.php?Event_Post_Removed");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin - Stepping Stones</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Lukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../images/logo.jpg">
	<!-- end: Favicon -->




</head>

<body>
		<!-- start: Header -->
	<?php include("include/header.php"); ?>
	<!-- start: Header -->
	<div>
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

				</li>

			</ul>
			<div class="row-fluid">
			<h2>Messages from website visitors</h2>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">No.</th>
            <th scope="col" style="text-align:left">Name</th>
            <th scope="col" style="text-align:left">Email</th>
            <th scope="col" style="text-align:left" width="40%">Message</th>
        </tr>
    </thead>
	<tbody>
	<?PHP
					  $sqlabout=mysql_query("select * from contactdet order by id " );
						if(mysql_num_rows($sqlabout)==0)
						{
						?>
                		<div class="error_box">
			        		No Record To Display!!
     					</div>
                      <?PHP }
					$i=1;
					while($resultabout=mysql_fetch_array($sqlabout))
					{
					 ?>
                      <tr bgcolor="#E1E1E1">
                        <td><?PHP echo $i; ?> </td>
                        <td style="text-align:left"><?PHP echo $resultabout['cname'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['email'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['msg'];  ?></td>
												<td><a class="btn btn-info" href="home.php?action=del_msg&amp;id=<?php echo $resultabout['id']; ?>">Delete
												<i class="halflings-icon white edit"></i>
															</a></td>
                      </tr>
                      <?PHP
					  $i++;
					  }
					  ?>
	</tbody>
       </table>
			</div>
			<div class="row-fluid">
			<br><br><h2>Urgent Requirements from Orphanages</h2>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">No.</th>
            <th scope="col" style="text-align:left">Organisation Name</th>
            <th scope="col" style="text-align:left" width="50%">Requirement</th>
        </tr>
    </thead>
	<tbody>
	<?PHP
					  $sqlabout=mysql_query("select a.upd_id as upd_id, b.name as oname, a.urgent as urgent from orpupdate as a inner join o_details as b on a.o_id=b.id where urgent!=''" );
						if(mysql_num_rows($sqlabout)==0)
						{
						?>
                		<div class="error_box">
			        		No Record To Display!!
     					</div>
                      <?PHP }
					$i=1;
					while($resultabout=mysql_fetch_array($sqlabout))
					{
					 ?>
                      <tr bgcolor="#E1E1E1">
                        <td><?PHP echo $i; ?> </td>
                        <td style="text-align:left"><?PHP echo $resultabout['oname'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['urgent'];  ?></td>
                        <?php
                        $post=mysql_query("select post_req from orpupdate where upd_id=".$resultabout['upd_id']);
                        $p=mysql_fetch_array($post);
                        if($p['post_req']==0)
                        {
                        ?>
							<td><a class="btn btn-info" href="home.php?action=post_req&amp;id=<?php echo $resultabout['upd_id']; ?>">Post
							<i class="halflings-icon white edit"></i>
										</a></td>
						<?php
						}
						else
						{
							?>
							<td><a class="btn btn-info" href="home.php?action=unpost_req&amp;id=<?php echo $resultabout['upd_id']; ?>">Remove Post
							<i class="halflings-icon white edit"></i>
										</a></td>
							<?php
						}
						?>
							<td><a class="btn btn-info" href="home.php?action=del_req&amp;id=<?php echo $resultabout['upd_id']; ?>">Delete
							<i class="halflings-icon white edit"></i>
										</a></td>
                      </tr>
                      <?PHP
					  $i++;
					  }
					  ?>
	</tbody>
       </table>
				<!-- End .sparkStats -->
			</div>
			<div class="row-fluid">
			<br><br><h2>Event proposals by Orphanages</h2>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">No.</th>
            <th scope="col" style="text-align:left">Organisation Name</th>
            <th scope="col" style="text-align:left" width="50%">Event</th>
        </tr>
    </thead>
	<tbody>
	<?PHP
					  $sqlabout=mysql_query("select a.upd_id as upd_id, b.name as oname, a.events as events from orpupdate as a inner join o_details as b on a.o_id=b.id where a.events!=''" );
						if(mysql_num_rows($sqlabout)==0)
						{
						?>
                		<div class="error_box">
			        		No Record To Display!!
     					</div>
                      <?PHP }
					$i=1;
					while($resultabout=mysql_fetch_array($sqlabout))
					{
					 ?>
                      <tr bgcolor="#E1E1E1">
                        <td><?PHP echo $i; ?> </td>
                        <td style="text-align:left"><?PHP echo $resultabout['oname'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['events'];  ?></td>
                        <?php
                        $ev=mysql_fetch_array(mysql_query("select post_event from orpupdate where upd_id=".$resultabout['upd_id']));
                        if($ev['post_event']==0)
                        {
                        ?>
							<td><a class="btn btn-info" href="home.php?action=post_event&amp;id=<?php echo $resultabout['upd_id']; ?>">Post
							<i class="halflings-icon white edit"></i>
										</a></td>
						<?php 
						} 
						else
							{?>
							<td><a class="btn btn-info" href="home.php?action=unpost_event&amp;id=<?php echo $resultabout['upd_id']; ?>">Remove Post
							<i class="halflings-icon white edit"></i>
										</a></td>
						<?php
						}
						?>
												<td><a class="btn btn-info" href="home.php?action=del_event&amp;id=<?php echo $resultabout['upd_id']; ?>">Delete
												<i class="halflings-icon white edit"></i>
															</a></td>
                      </tr>
                      <?PHP
					  $i++;
					  }
					  ?>
	</tbody>
       </table>
				<!-- End .sparkStats -->
			</div>
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

	<div class="clearfix"></div>

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
