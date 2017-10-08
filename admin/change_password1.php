<?PHP
include("include/connect.php");

if(!isset($_SESSION['admin']))
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
	<title>myjobhouse.com</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../images/logo.jpg">
	<!-- end: Favicon -->
	
		
		
		
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
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				
				<li><a href="#">Change Password</a></li>
			</ul>

			<div class="row-fluid">
				<div class="center_content">  
    
    
    
    <div class="right_content">            
        
    <h2>Change Password</h2> 
	 
<?PHP
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
if($req=='edited')
{
?>
	 <div class="valid_box">
        Record Edited Successfully
     </div>
<?PHP
}
?>		
<?PHP
$req=isset($_REQUEST['empty']) ? $_REQUEST['empty'] :'';
if($req=="empty")
{
?>
	 <div class="valid_box">
        <strong>Please fill all fields.</strong>
     </div>
<?PHP
}
?>	


<?PHP 
$req=isset($_REQUEST['change']) ? $_REQUEST['change'] :'';
if( $req=="change")
		{
		?>
<div class="valid_box">
        <strong>Password changed Successfully.</strong>
     </div>
<?PHP
}
?>			
<?PHP  
$req=isset($_REQUEST['notold']) ? $_REQUEST['notold'] :'';
if($req=="notold")
		{
		?>
<div class="valid_box">
        <strong>Sorry!!Old Password is wrong..</strong>
     </div>
<?PHP
}
?>			
<?PHP 
$req=isset($_REQUEST['notmatch']) ? $_REQUEST['notmatch'] :'';
if($req=="notmatch")
		{
		?>
<div class="valid_box">
        <strong>Sorry!!New/Confirm Password must be same</strong>
     </div>
<?PHP
}		
?>		  
	
	<div class="left_content">
				
				<div class="box-content">
					<form action="change_pass_db.php" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">
					<fieldset>
				  
				  				  
				  <div class="control-group">
					<label class="control-label" for="typeahead">Old Password : </label>
					<div class="controls">
					<input name="old_pass" type="password" class="button" /></div>
					</div> 
					<div class="clear"></div>
					
					<div class="control-group">
					<label class="control-label" for="typeahead">New Password : </label>
					<div class="controls"><input name="new_pass" type="password" class="button" />
					</div>
					</div> 
					<div class="clear"></div>
					
					<div class="control-group">
					<label class="control-label" for="typeahead">Confirm Password : </label>
					<div class="controls"><input name="confirm_pass" type="password" class="button" />
					  
					</div>
					</div> 
					<div class="clear"></div>
					
                    
          <div>
                      <div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  
							</div>
</div>
</fieldset>
                  </form>
                </div></td>
              </tr>
			  
	
	</div>
    
	
    
    <div class="clear"></div>
    </div>

				
				<div class="clearfix"></div>
								
			</div><!--/row-->
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
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
