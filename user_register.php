<?php
include("admin/include/connect.php");
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req =='add')
{
 $targetfolder = "user_register/";
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 $ok=1;
$file_type=$_FILES['file']['type'];
move_uploaded_file( $_FILES['file']['tmp_name'], $targetfolder );

	mysql_query("insert into uregister(f_name,l_name,u_email,password,u_address,u_city,u_phone) values('".$_POST['First_Name']."','".$_POST['Last_Name']."','" . $_POST['Email_id'] . "','" . $_POST['crt_password'] . "','".$_POST['address']."','".$_POST['city']."','".$_POST['phone']."')");
	phpAlert("Successfully Registered");
	header('Location:user_register.php?msg=added');
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
</style>
<script type="text/javascript">
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
                      
			 function isAlphabat(elem,helpMsg)
			 {
				 var alphaExp=/^[a-zA-Z]+$/;

 				if(elem.value.match(alphaExp))
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
			
 			function emailValidator(elem,helpMsg)
			{
			var emailExp=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
				 if(elem.value.match(emailExp))
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
			function length_val(elem,len,helpMsg)
			{
				if(elem.value.length<len)
				{
					alert(helpMsg);
					elem.focus();
					return false;
				}
				else
					return true;
			}
			function val_pword(elem1,elem2,helpMsg)
			{
				if(elem1.value==elem2.value)
					return true;
				else
				{
					alert(helpMsg);
					elem2.focus();
					return false;
				}
			}
			function validateform()
			{
				if(!isAlphabat(user_reg.First_Name , "Enter valid First Name"))
					return false;
				if(!isAlphabat(user_reg.Last_Name , "Enter valid Last Name"))
					return false;
				if(!emailValidator(user_reg.Email_id , "Enter valid Email"))
					return false;
				if(!length_val(user_reg.cnf_password , 6 , "Minimum 6 characters required for password"))
					return false;
				if(!val_pword(user_reg.crt_password , user_reg.cnf_password, "Passwords do not match"))
					return false;
				if(!phone(user_reg.phone , "Enter valid phone number"))
					return false;
				alert("Successfully Registered");
				return true;
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
		<form id="ContactForm" action="user_register.php?action=add" enctype="multipart/form-data" onSubmit="return validateform();" method="post" name="user_reg">
				<table width="70%" align="right" style="margin-right: 10%" >

<tr style="margin-top:15px;">
  <td class="tex_td">First name<span style="color:red;">*</span> 
  </td><td><input name="First_Name" class="text_box2" id="nm" type="text" maxlength="50" required />
</td>
</tr>
<tr style="margin-top:15px;">
  <td class="tex_td">Last name<span style="color:red;">*</span> 
  </td><td><input name="Last_Name" class="text_box2" id="nm" type="text" maxlength="50" required />
</td>
</tr>
<tr><td class="tex_td">Email<span style="color:red;">*</span>          
 </td><td><input name="Email_id" id="email" class="text_box2" type="text" maxlength="100"  /></td>
 <tr>
   <td class="tex_td">Create password<span style="color:red;">*</span>                                    
   </td><td><input name="crt_password" class="text_box2" type="password" maxlength="100" required /></td>
</tr>
<tr>
   <td class="tex_td">Confirm Password<span style="color:red;">*</span>                                    
   </td><td><input name="cnf_password" class="text_box2" type="password" maxlength="100" required /></td>
</tr>
<tr>
   <td class="tex_td">Address                                           
   </td><td><input name="address" class="text_box2" type="text" maxlength="100"  /></td>
</tr>
<tr><td class="tex_td">City                                              
</td><td><input name="city" class="text_box2"   type="text" maxlength="50"  /></td>
</tr>

<tr>
<td class="tex_td">Phone <span style="color:red;">*</span></td> 
<td><input name="phone" class="text_box2" id="contno" type="number" maxlength="50" /></td>
</tr> 
</table>
<br />
<div style="text-align:center;">
<table border="0" cellpadding="0" cellspacing="0" style="text-align:center; width:300px; margin:auto;">
</table>
<br><br>
<input name="Submit" type="submit" value="Signup" class="myButton"/><br>

									
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

