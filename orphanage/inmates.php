<?PHP
session_start();
include("include/connect.php");

if(!isset($_SESSION['orphanage']))
	{
		header("Location: index.php");
	}
$today=date('Y-m-d');	

$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';

if($req=='add')
{
	
$sql=mysql_query(" insert into inmates_details(id,name,age,gender,stud_type,grade,institution,approx_fees) values('".$_SESSION['orphanageid']."' , '".$_POST['title']."' ,'".$_POST['age']."', '".$_POST['gender']."', '".$_POST['stud_type']."', '".$_POST['grade']."', '".$_POST['institution']."', '".$_POST['fees']."')");

		header('Location: inmates.php?mode=show&msg=added');
}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req=='save')
{
mysql_query("update inmates_details set name='".$_POST['title']."',age='".$_POST['age']."',gender='".$_POST['gender']."',grade='".$_POST['grade']."',institution='".$_POST['institution']."',approx_fees='".$_POST['fees']."', isapproved=0 where s_id=".$_GET['id']);
header('Location:inmates.php?mode=show&msg=edited');
	}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req=='delete')
{
		mysql_query("delete from inmates_details where id=".$_GET['id']);
		header('Location:inmates.php?mode=show&msg=deleted');
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
					<a href="home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="inmates.php?mode=show">Students </a></li>
			</ul>
			<div class="row-fluid" style="min-height:900px">
			<div class="center_content">  
    		<div class="right_content">            
    	<h2>Students Page</h2> 
<?PHP
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
	if($req=='edited')
{
?>
	 <div class="valid_box" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
        Record Edited Successfully
     </div>
<?PHP
}
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
if($req=='deleted')
{
?>
	 <div class="valid_box" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
        Record Deleted Successfully
     </div>
<?PHP
}
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
	if($req=='added')
{
?>
	 <div class="valid_box" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
        Record Added Successfully
     </div>
<?PHP
}
?>
	<?PHP	
	if(isset($_GET['mode']) && ($_GET['mode']=='show'))
					{
				?>                    
         <div class="box-content">      
  		<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">S.No.</th>
            <th scope="col" style="text-align:left">Name</th>
            <th scope="col" style="text-align:left">Actions</th>
        </tr>
    </thead>
	<tbody>
	<?PHP	
					  $sqlabout=mysql_query("select * from inmates_details order by id " ); 
					  if(mysql_num_rows($sqlabout)==0)
						{
						?>
                		<div class="error_box">
			        		No Record To Display!!
     					</div>
                      <?PHP } ?>
                      <?PHP
					$i=1;
					while($resultabout=mysql_fetch_array($sqlabout))
					{
					 ?>
                      <tr bgcolor="#E1E1E1">
                        <td><?PHP echo $i.'.'; ?> </td>
                        <td style="text-align:left"><?PHP echo $resultabout['name'];  ?></td>
                        <td style="text-align:left">
						<a class="btn btn-info" href="inmates.php?mode=edit&amp;id=<?php echo $resultabout['s_id']; ?>">Edit
						<i class="halflings-icon white edit"></i>  
									</a>					
						<a class="btn btn-danger" href="inmates.php?action=delete&amp;id=<?php echo $resultabout['s_id']; ?>" onClick="return confirm('Are you sure you want to delete this data?');">Delete
		<i class="halflings-icon white trash"></i>  
									</a>			
						</td>
                      </tr>
                      <?PHP
					  $i++;
					  }					  
					  ?>	
	</tbody>
	<tfoot>
    	<tr>
        	<td colspan="2" class="rounded-foot-left"></td>
        	<td class="rounded-foot-right"><a href="inmates.php?mode=add" class="bt_green"><span class="bt_green_lft"></span><strong>Add new records</strong><span class="bt_green_r"></span></a></td>
        </tr>
    </tfoot>
       </table>
	   </div>  
	      <?PHP
				}
				?>
    </div>
	<div class="left_content">
				<?PHP	
					if(isset($_GET['mode']) && ($_GET['mode']=='add'))
					{
				?>	
				<div class="box-content">
					<form action="inmates.php?action=add" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">
					<fieldset>
				  <div class="control-group">
					<label class="control-label" for="typeahead">Name: </label>
					<div class="controls"><input name="title" type="text" class="button" size="60" />
					</div>
					</div>
						<div class="control-group">
					<label class="control-label" for="typeahead">Age: </label>
					<div class="controls"><input name="age" type="text" class="button" size="60" />
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Gender: </label>
					<div class="controls">
					<select name="gender">
						<option selected>--Select--</option>
						<option value="Male" >Male</option>
						<option value="Female" >Female</option>
					</select>
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Schooling type: </label>
					<div class="controls">
					<select name="stud_type">
						<option selected>--Select--</option>
						<option value="School" >School</option>
						<option value="UG" >Under Graduate</option>
						<option value="PG" >Post Graduate</option>
					</select>
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Grade: </label>
					<div class="controls"><input name="grade" type="text" class="button" size="60" />
					</div>
					</div>		
					<div class="control-group">
					<label class="control-label" for="typeahead">Institution: </label>
					<div class="controls"><input name="institution" type="text" class="button" size="60" />
					</div>
					</div>	
					<div class="control-group">
					<label class="control-label" for="typeahead">Approximate annual fees: </label>
					<div class="controls"><input name="fees" type="text" class="button" size="60" />
					</div>
					</div>		
					</div>
					</div> 
					<div class="clear"></div>
          <div>
                      <div class="form-actions">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <button type="submit" class="btn btn-primary">Add student</button>
							</div>
					</div>
					</fieldset>
                  </form>
                </div></td>
              </tr>
			<?PHP	
				}
				?> 
		</div>
	<div class="left_content">
				<?PHP	
					if(isset($_GET['mode']) && ($_GET['mode']=='edit'))
					{
				?>	
				<div class="box-content">
					<form action="inmates.php?action=save&id=<?PHP echo $_GET['id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">
					<fieldset>
				  <?PHP
				  $about=mysql_query("select * from inmates_details where s_id=" . $_GET['id']);
				  $about_data=mysql_fetch_array($about);
				  ?>
				  <div class="control-group">
					<label class="control-label" for="typeahead">Name: </label>
					<div class="controls"><input name="title" type="text" class="button" size="60" value="<?PHP echo $about_data['name']; ?>" />
					</div>
					</div>
						<div class="control-group">
					<label class="control-label" for="typeahead">Age: </label>
					<div class="controls"><input name="age" type="text" class="button" size="60" value="<?PHP echo $about_data['age']; ?>" />
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Gender: </label>
					<div class="controls">
					<select name="gender">
						<option value="Male" <?php if($about_data['gender']=='Male') echo "selected" ?> >Male</option>
						<option value="Female" <?php if($about_data['gender']=='Female') echo "selected" ?>>Female</option>
					</select>
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Grade: </label>
					<div class="controls"><input name="grade" type="text" class="button" size="60" value="<?PHP echo $about_data['grade']; ?>" />
					</div>
					</div>		
					<div class="control-group">
					<label class="control-label" for="typeahead">Institution: </label>
					<div class="controls"><input name="institution" type="text" class="button" size="60" value="<?PHP echo $about_data['institution']; ?>" />
					</div>
					</div>	
					<div class="control-group">
					<label class="control-label" for="typeahead">Approximate annual fees: </label>
					<div class="controls"><input name="fees" type="text" class="button" size="60" value="<?PHP echo $about_data['approx_fees']; ?>" />
					</div>
					</div>		
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
			  <?PHP	
				}
				?>
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
