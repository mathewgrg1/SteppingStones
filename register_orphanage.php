<?php
include("admin/include/connect.php");
$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req =='add')
{
 $targetfolder = "initial_details/";
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 $ok=1;
$file_type=$_FILES['file']['type'];
move_uploaded_file( $_FILES['file']['tmp_name'], $targetfolder );
include("rp.php");
$pass=randomPassword();
	mysql_query("insert into o_details(name,email,address,city,phone,est_year,init_details,comment,orpPass) values('".$_POST['First_Name']."','" . $_POST['Email_id'] . "','".$_POST['address']."','".$_POST['city']."','".$_POST['Phone']."','".$_POST['experiance']."','". basename( $_FILES['file']['name'])."','".$_POST['Reference']."','".$pass."')");
	header('Location:register_orphanage.php?msg=added');
}

$req=isset($_REQUEST['msg']) ? $_REQUEST['msg'] :'';
if($req=='added')
{
	$regcontact=mysql_query("select max(id) as qid from o_details");
	$result=mysql_fetch_array($regcontact);
	$sql=mysql_query("select * from o_details where id=".$result['qid']);
	$fetch=mysql_fetch_array($sql);
	$body = "Dear Mr. ,";
	$body.="\n";
	$body .= "New application on steppingstones.com";
	$body.="\n";
	$body.="Name";
	$body.= "\t";
	$body.=$fetch['name'];
	$body.="\n";
	$body.="Located at";
	$body.="\t";
	$body.=$fetch['address'].' '.$fetch['city'];
	$body.="\n";
	$body.="Contact No.";
	$body.="\t";
	$body.='+' .$fetch['phone'];
	$body.="\n";
	$body.="E-Mail";
	$body.="\t";
	$body.=$fetch['email'];
	$body.="\n";
	$body.="Reference / Comments / Questions";
	$body.="\t";
	$body.=$fetch['comment'];
	$body.="\n";
	$subject = "Applicant Details";
	$mail_to = "steppingstones.ngo@gmail.com";
	$headers = 'From:'. $fetch['email'] ;
	$res_mail=mail($mail_to,$subject,$body,$headers);
	header('Location:register_orphanage.php?msg=added2');
}
$req=isset($_REQUEST['msg']) ? $_REQUEST['msg'] :'';
if($req=='added2')
{
	$regcontact=mysql_query("select max(id) as qid from o_details");
	$result=mysql_fetch_array($regcontact);
	$sql=mysql_query("select * from o_details where id=".$result['qid']);
	$fetch=mysql_fetch_array($sql);
	$body = "Dear Mr/Ms " ;
	$body.= $fetch['fname'];
	$body.="\n";
	$body.= "Welcome to steppingstones.com, your application is Submitted! We will intimate after verification...";
	$body.="\n";
	$body.="\n";
	$body.="Regards,";
	$body.="\n";
	$body.="Relationship Team"; 
	$body.="\n";
	$body.="steppingstones.com";
	$body.="\n";
	$subject = "Application Submission Confirmation";
	$mail_to = $fetch['email'];
	$headers = 'From: steppingstones.ngo@gmail.com';
	$res_mail=mail($mail_to,$subject,$body,$headers);
	if($res_mail==true)
    header('Location:register_orphanage.php?msg=success');
	else
		header('Location:register_orphanage.php?msg=unsuccess');
}                               
$req=isset($_REQUEST['msg']) ? $_REQUEST['msg'] :'';
if($req=='success')
{
	?>
	<script type="text/javascript">
	alert("Application submitted successfully. Please check your mail for details.");
	</script>
	<?php
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

<script type="text/javascript">
		
			function notEmpty(elem,helpMsg)
			{
			  if(elem.value.length==0)
			   {

				alert(helpMsg);
				elem.focus();
				return false;
			   }
			   return true;
			}
                        function phone(elem,helpMsg)
			{
			  if(elem.value.length==10)
			    {
                             return true;
				
			    }
			    
                              alert(helpMsg);
				 elem.focus();
 				return false;
			}
			function val_year(elem,helpMsg)
			{
			  if(elem.value.length==4 && elem.value>1800 && elem.value<2016)
			    {
                             return true;
				
			    }
			    
                              alert(helpMsg);
				 elem.focus();
 				return false;
			}
			     
			 function isAlphabat(elem,helpMsg)
			 {
				 var alphaExp=/^[a-zA-Z]+$/;
				 var alphaExp2=/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;

 				if(elem.value.match(alphaExp) || elem.value.match(alphaExp2))
				 {
						 return true;
				 }
 				else
 				{
 					alert(helpMsg);
 					elem.value="";
					elem.focus();
					 return false;
				}
			 	
 			}
			
			function validateform()
			{
			if(!isAlphabat(orp_reg.First_Name , "Enter valid First Name"))
				return false;
			if(!phone(orp_reg.Phone , "Enter valid phone number"))
				return false;
			if(!val_year(orp_reg.experiance , "Enter valid year"))
				return false;
			if(!validate())
				return false;
			return true;
			}
	  </script>

<script>
function validate() {
    var filename=document.getElementById('file').value;
    var extension=filename.substr(filename.lastIndexOf('.')+1).toLowerCase();
    //alert(extension);
    if(extension=='xls' || extension=='xlsx' || extension=='pdf') {
        return true;
    } else {
        alert('Please Upload xls/xlsx/pdf File');
        return false;
    }
}
</script>


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
<div id="matter" style="background-color:#FFFFFF;">
<div id="content" style="background-color:#FFFFFF; padding-bottom:20px;">
<article class="col1" style="margin-left: 120px;width:700px; float:left;">
						<h2></h2>
		<form id="ContactForm" action="register_orphanage.php?action=add" enctype="multipart/form-data" onSubmit="return validateform();" method="post" name="orp_reg">
				<table width="100%" >

<tr style="margin-top:15px;">
  <td class="tex_td">Organisation Name<span style="color:red;">*</span>
  </td><td><input name="First_Name" class="text_box2" id="nm" type="text" maxlength="50" required />
</td>
</tr>
<tr><td class="tex_td">Email<span style="color:red;">*</span></td>
<td><input name="Email_id" id="email" class="text_box2" type="email" maxlength="100" required /></td>
</tr>
<tr>
   <td class="tex_td">Address<span style="color:red;">*</span></td>
   <td><input name="address" class="text_box2" type="text" maxlength="100" required /></td>
</tr>
<tr><td class="tex_td">City<span style="color:red;">*</span></td>
<td><input name="city" class="text_box2"   type="text" maxlength="50" required /></td>
</tr>

<tr>
<td class="tex_td">Phone<span style="color:red;">*</span></td>
<td><input name="Phone" class="text_box2" id="contno" type="text" maxlength="50" required /></td>
</tr>
<tr><td class="tex_td">Year of establishment<span style="color:red;">*</span></td><td><input name="experiance" class="text_box2"   type="text" maxlength="4" required /></td>
</tr>

<tr>
<td class="tex_td" >Upload your current inmates status<span style="color:red;">*</span></td>
<td><input name="file" class="text_box2" type="file" maxlength="100" class="text_box2" id="file" required /> </td>
</tr>
<tr>
<td class="tex_td" >Reference / Comments / Questions</td><br />
<td class="tex_td"><textarea name="Reference" rows="3" cols="30" class="text_box2"></textarea></td>
</tr>
</table>
<br />
<div style="text-align:center;">
<table border="0" cellpadding="0" cellspacing="0" style="text-align:center; width:300px; margin:auto;">
</table>

<input name="Submit" type="submit" value="Submit Application" class="myButton"/><br>

									
								</form>
					</article>
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

