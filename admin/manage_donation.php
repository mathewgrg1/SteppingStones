<?PHP
session_start();
include("include/connect.php");

	if(!isset($_SESSION['admin']))
	{
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin: Manage Donations</title>
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
					<a href="home.php">Manage Donations</a>
				</li>
	
			</ul>
			<div class="row-fluid">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<tr>
				<?php
				$total=mysql_query("select sum(amount) as s from donations");
				$tot=mysql_fetch_array($total);
				$spent=mysql_query("select sum(amount) as s from manage_donation");
				$sp=mysql_fetch_array($spent);
				$rem=0;
				$rem=$tot['s']-$sp['s'];
				?>
					<td>Total Donations recieved: <span style="color: red; ">Rs. <?php echo $tot['s']; ?></span></td>
					<td>Amount given to orphanages: <span style="color: red;">Rs. <?php echo $sp['s']; ?></span></td>
					<td>Amount remaining: <span style="color: red;">Rs. <?php echo $rem; ?></span></td>
				</tr>
				</table>
				<a class="btn btn-info" href="manage_donation.php?mode=add_record">Add New Record
						<i class="halflings-icon white edit"></i>  
									</a><br><br>
									<?php
									if(isset($_GET['mode']) && ($_GET['mode']=='filter'))
										{ ?>
				<form action="manage_donation.php?action=filter&amp;mode=filter" method="post">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<tr>
				<td>Organisation Name</td>
				<td><select class="text_box2" name="orp">
				<option value="0">--Any--</option>
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
				<td>From</td>
				<td><input type="date" name="fromdate"></td>
				</tr>
				<tr>
					<td>To</td>
					<td><input type="date" name="todate"></td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-info" value="Filter Results"></td>
									
				</tr>
				</table>
				</form>
			<?php } ?>
			</div>
			<div class="row-fluid">
			<?php
   if(isset($_GET['action']) && ($_GET['action']=='filter'))
			{
				?>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">S.No.</th>
            <th scope="col" style="text-align:left">Organisation Name</th>
            <th scope="col" style="text-align:left">Amount</th>
            <th scope="col" style="text-align:left">Admin</th>
            <th scope="col" style="text-align:left">Timestamp</th>
        </tr>
    </thead>
	<tbody>
	<?PHP	
	$req=isset($_POST['orp']) ? $_POST['orp'] :'';
	$fd=isset($_POST['fromdate']) ? $_POST['fromdate'] :'';
	$td=isset($_POST['todate']) ? $_POST['todate'] :'';
				if($req==0)
				{
					if($fd==NULL && $td==NULL)
					  $sqlabout=mysql_query("select b.name as orpname, c.name as adm_name, a.amount as amount, a.date as date from manage_donation as a inner join o_details as b on a.o_id=b.id inner join team_member as c on a.adm_id=c.id" ); 
					if($fd!=NULL && $td==NULL)
					  $sqlabout=mysql_query("select b.name as orpname, c.name as adm_name, a.amount as amount, a.date as date from manage_donation as a inner join o_details as b on a.o_id=b.id inner join team_member as c on a.adm_id=c.id where date>'".$fd." 00:00:00'" ); 
					if($fd==NULL && $td!=NULL)
					  $sqlabout=mysql_query("select b.name as orpname, c.name as adm_name, a.amount as amount, a.date as date from manage_donation as a inner join o_details as b on a.o_id=b.id inner join team_member as c on a.adm_id=c.id where date<'".$td." 00:00:00'" ); 
					if($fd!=NULL && $td!=NULL)
					  $sqlabout=mysql_query("select b.name as orpname, c.name as adm_name, a.amount as amount, a.date as date from manage_donation as a inner join o_details as b on a.o_id=b.id inner join team_member as c on a.adm_id=c.id where date>'".$fd." 00:00:00' and date<'".$td." 00:00:00'" ); 
					}
					else
					{
						$sqlabout=mysql_query("select b.name as orpname, c.name as adm_name, a.amount as amount, a.date as date from manage_donation as a inner join o_details as b on a.o_id=b.id inner join team_member as c on a.adm_id=c.id where b.id='".$_POST['orp']."'" );
					}
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
                        <td style="text-align:left"><?PHP echo $resultabout['orpname'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['amount'];  ?></td>
                        <td style="text-align:left"><?PHP echo $resultabout['adm_name'];  ?></td>		
                        <td style="text-align:left"><?PHP echo $resultabout['date'];  ?></td>							
                      </tr>
                      <?PHP
					  $i++;
					  }					  
					  ?>	
	</tbody>
       </table>
       <?php
   }
   if(isset($_GET['mode']) && ($_GET['mode']=='add_record'))
			{
				?>
				<form action="manage_donation.php?action=add_record" method="post">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
    	<tr>
            <td scope="col" style="text-align:left">Organisation Name: </td>
            <td><select class="text_box2" name="orp" required>
				<option>--Any--</option>
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
            <td scope="col" style="text-align:left">Amount: </td>
            <td><input type="number" name="amt" required></td>
        </tr>
        <tr>
        <td colspan="2"><input type="submit" value="Add record" class="btn btn-info"></td>
        </tr>
       </table>
       </form>
       <?php
   }
   ?>
				<!-- End .sparkStats -->
			</div>
		
		<!--/.fluid-container-->
	
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
	<div class="clear"></div>
    </div>

				<div class="clearfix"></div>	
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
<?php
if(isset($_GET['action']) && ($_GET['action']=='add_record'))
{
				$total=mysql_query("select sum(amount) as s from donations");
				$tot=mysql_fetch_array($total);
				$spent=mysql_query("select sum(amount) as s from manage_donation");
				$sp=mysql_fetch_array($spent);
				$rem=0;
				$rem=$tot['s']-$sp['s'];
				$amt=$_POST['amt'];
	if($amt<=$rem)
	{
	mysql_query("insert into manage_donation(o_id, adm_id, amount) values('".$_POST['orp']."','".$_SESSION['adminid']."','".$amt."')");
	header("Location: manage_donation.php?Added");
}
else
	header("Location: manage_donation.php?Failed");
}
?>