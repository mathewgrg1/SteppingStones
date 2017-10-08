<?PHP
session_start();
include("include/connect.php");
if(!isset($_SESSION['admin']))
	{
		header("Location: index.php");
	}
$today=date('Y-m-d');	
$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req=='add')
{
	$targetfolder = "image/";
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 $ok=1;
$file_type=$_FILES['file']['type'];
move_uploaded_file( $_FILES['file']['tmp_name'], $targetfolder );
		
$sql=mysql_query(" insert into gallery(title,description,imgPath_home) values('".$_POST['title']."' , '".$_POST['description']."' , '".basename( $_FILES['file']['name'])."')");

		header('Location: gallery.php?mode=show&msg=added');
}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req=='edit')
{
$sqlget=mysql_query("select * from gallery where id=".$_GET['id']);
$res=mysql_fetch_array($sqlget);

 if($_FILES['file']['name']!="")
			{
				$filename = rand().$_FILES['file']['name'];
				$filename=str_replace(" ", "_", $filename);
				$temporary_name = $_FILES['file']['tmp_name']; 
				$filename_1 = $_POST['file'];
				$uploaddir = 'image/';
				$uploadfile = $uploaddir . basename($filename);
				$allowedExts = array("jpg","jpeg","pjpeg","gif","png");
				$temp = explode(".", $filename);
				$extension = end($temp);
				if(in_array($extension, $allowedExts))
				{
				   move_uploaded_file($temporary_name,$uploadfile);
				}
			}
			if($_FILES['file']['name']=="")
				{
				   $filename=$filename_1;
				}
		if($filename == '')
		{
		$image1=$res['imgPath_home'];
		}
		else
		{
		$image1=$filename;
		}
mysql_query("update gallery set title='".$_POST['title']."',description='".$_POST['description']."',imgPath_home='".$image1."' where id=".$_GET['id']);
header('Location:gallery.php?mode=show&msg=edited');
	}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req=='delete')
{
		mysql_query("delete from gallery where id=".$_GET['id']);
		header('Location:gallery.php?mode=show&msg=deleted');
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
				<li><a href="gallery.php">Gallery </a></li>
			</ul>
			<div class="row-fluid" style="min-height:900px">
			<div class="center_content">  
    		<div class="right_content">            
    	<h2>Gallery Page</h2> 
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
            <th scope="col" style="text-align:left">Title</th>
            <th scope="col" style="text-align:left">Actions</th>
        </tr>
    </thead>
	<tbody>
	<?PHP	
					  $sqlabout=mysql_query("select * from gallery order by id " ); 
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
                        <td style="text-align:left"><?PHP echo $resultabout['title'];  ?></td>
                        <td style="text-align:left">
						<a class="btn btn-info" href="gallery.php?mode=edit&amp;id=<?php echo $resultabout['id']; ?>">Edit
						<i class="halflings-icon white edit"></i>  
									</a>					
						<a class="btn btn-danger" href="gallery.php?action=delete&amp;id=<?php echo $resultabout['id']; ?>" onClick="return confirm('Are you sure you want to delete this data?');">Delete
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
        	<td class="rounded-foot-right"><a href="gallery.php?mode=add" class="bt_green"><span class="bt_green_lft"></span><strong>Add new records</strong><span class="bt_green_r"></span></a></td>
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
					<form action="gallery.php?action=add" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">
					<fieldset>
				  <div class="control-group">
					<label class="control-label" for="typeahead">Enter Title: </label>
					<div class="controls"><input name="title" type="text" class="button" size="60"
					placeholder="Enter title"  />
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Enter Description: </label>
					<div class="controls"><textarea name="description" type="text" class="button" rows="5" cols="30" ></textarea>
					</div>
					</div>
					<div class="control-group">
				  <label class="control-label" for="typeahead">Home Page Image Path: </label>
					<div class="controls"><input name="file" type="file" class="button" size="60" id="img1" />
					
					<br />
                          <span class="text1">(image size should be 120*80 pixels)</span></td>
					</div>
					</div>
					
					<div class="clear"></div>
					<div>
                      <div class="form-actions">
					  <button type="submit" class="btn btn-primary">Save </button>
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
					<form action="gallery.php?action=edit&id=<?PHP echo $_GET['id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">
					<fieldset>
				  <?PHP
				  $about=mysql_query("select * from gallery where id=" . $_GET['id']);
				  $about_data=mysql_fetch_array($about);
				  ?>
				  <div class="control-group">
					<label class="control-label" for="typeahead">Enter Title: </label>
					<div class="controls"><input name="title" type="text" class="button" size="60" value="<?PHP echo $about_data['title']; ?>" />
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Enter Description: </label>
					<div class="controls"><textarea name="description" type="text" class="button" rows="5" cols="30" ><?PHP echo $about_data['description']; ?></textarea>
					</div>
					</div>
	
					<div class="control-group">
					<label class="control-label" for="typeahead">&nbsp; </label>
					<div class="controls"><img src="image/<?PHP echo $about_data['imgPath_home']; ?>" style="width:400px; height:200px; margin-bottom:20px" />
					<input type="hidden" name="file" value="<?PHP echo $about_data['imgPath_home']; ?>" />
					</div>	
					<div class="control-group">
				  <label class="control-label" for="typeahead">Home Page Image Path: </label>
					<div class="controls"><input name="file" type="file" class="button" size="60" id="img2" />
					<br />
                          <span class="text1">(image size should be 120*80 pixels)</span></td>
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
