<?PHP
session_start();
include("include/connect.php");

	if(!isset($_SESSION['orphanage']))
	{
		header("Location:index.php");
	}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';

	if($req=='del_msg')
	{
		$qry="delete from celebs where c_id=". $_GET['id'];
		mysql_query($qry);
		header("Location: home.php?Message_Deleted");
	}
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
			<h2>Celebration enquiries</h2>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">No.</th>
            <th scope="col" style="text-align:left">Name</th>
            <th scope="col" style="text-align:left">Phone</th>
            <th scope="col" style="text-align:left">Occassion</th>
            <th scope="col" style="text-align:left">Date</th>
            <th scope="col" style="text-align:left">Time</th>
            <th scope="col" style="text-align:left">Comments</th>
            <th scope="col" style="text-align:left">Action</th>
        </tr>
    </thead>
	<tbody>
	<?PHP
					  $sqlabout=mysql_query("select b.c_id as id, a.f_name as name, a.u_phone as phone, b.occassion as occassion, b.date as date, b.time as time, b.comment as comment from uregister as a inner join celebs as b on a.u_id=b.u_id where o_id='".$_SESSION['orphanageid']."'" );
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
                        <td style="text-align:left"><?PHP echo $resultabout['name'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['phone'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['occassion'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['date'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['time'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['comment'];  ?></td>
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
			
				<!-- End .sparkStats -->
			</div>
			<div class="row-fluid">
				
				<!--/span-->
				
				<!--/span-->
			</div>
			
			<div class="row-fluid" style="height:900px">
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
