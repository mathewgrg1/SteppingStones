<?PHP
session_start();
include("include/connect.php");

	if(!isset($_SESSION['orphanage']))
	{
		header("Location:index.php");
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
			<div class="left_content">
		<?php
					 $about=mysql_query("select * from o_details where id=" . $_SESSION['orphanageid']);
				  $about_data=mysql_fetch_array($about);
				?>	
				<div class="box-content">
					<form action="edit_det.php?action=save" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">
					<fieldset>
				  <div class="control-group">
					<label class="control-label" for="typeahead">Name </label>
					<div class="controls"><input name="title" type="text" class="button" size="60" value="<?PHP echo $about_data['name']; ?>" />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="typeahead">Address </label>
					<div class="controls"><input name="address" type="text" class="button" size="60" value="<?PHP echo $about_data['address']; ?>" />
					</div>
					</div>

					<div class="control-group">
					<label class="control-label" for="typeahead">City </label>
					<div class="controls"><input name="city" type="text" class="button" size="60" value="<?PHP echo $about_data['city']; ?>" />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="typeahead">E-Mail ID </label>
					<div class="controls"><input name="email" type="text" class="button" size="60" value="<?PHP echo $about_data['email']; ?>" />
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Phone </label>
					<div class="controls"><input name="phone" type="text" class="button" size="60" value="<?PHP echo $about_data['phone']; ?>" />
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Year of establishment </label>
					<div class="controls"><input name="totalexp" readonly="true" type="text" class="button" size="60" value="<?PHP echo $about_data['est_year']; ?>" />
					</div>
					</div>
					<div class="control-group">
				  <label class="control-label" for="typeahead">Home Page Image Path: </label>
					<div class="controls"><input name="file" type="file" class="button" size="60" id="img1" />
					
					<br />
                          <span class="text1">(image size should be 120*80 pixels)</span></td>
					</div>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" class="btn btn-primary">Save</button>

					<?php
					$take=mysql_query("select * from o_details where id=" . $_SESSION['orphanageid']);
					$re=mysql_fetch_array($take);
					?>
					
					</fieldset>
                  </form>
			
	</div>
<?php
if(isset($_GET['action']) && ($_GET['action']=='save'))
{
	$targetfolder = "image/";
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 $ok=1;
$file_type=$_FILES['file']['type'];
move_uploaded_file( $_FILES['file']['tmp_name'], $targetfolder );
	$sql="update o_details set name='".$_POST['title']."', email='".$_POST['email']."', address='".$_POST['address']."', phone='".$_POST['phone']."', city='".$_POST['city']."',imgPath='".basename( $_FILES['file']['name'])."' where id=".$_SESSION['orphanageid'];
	mysql_query($sql);
	header("Location: edit_det.php?Saved");
}
?>

    <div class="clear"></div>
    </div>
			</div>
			<div class="row-fluid">
			
				<!-- End .sparkStats -->
			</div>
			<div class="row-fluid">
				
				<!--/span-->
				
				<!--/span-->
			</div>
			
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
