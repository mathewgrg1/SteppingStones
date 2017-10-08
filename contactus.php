<?php
include("admin/include/connect.php");
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req =='add')
{
	mysql_query("insert into contactdet(cname,email,msg) values('".$_POST['cname']."','".$_POST['email']."','".$_POST['msg']."')");
	phpAlert("Message sent");
}
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
if($req=='added')
{
	$regcontact=mysql_query("select max(id) as qid from contactdet");
	$result=mysql_fetch_array($regcontact);
	$sql=mysql_query("select * from contactdet where id=".$result['qid']);
	$fetch=mysql_fetch_array($sql);
	$body = "Dear Mr. ,";
	$body.="\n";
	$body .= "Here are the details of query on myjobhouse.com";
	$body.="\n";
	$body.="Name";
	$body.= "\t";
	$body.=$fetch['cname'];
	$body.="\n";
	$body.="E-Mail";
	$body.="\t";
	$body.=$fetch['email'];
	$body.="\n";
	$body.="Mobile";
	$body.="\t";
	$body.=$fetch['phone'];
	$body.="\n";
	$body.="Message";
	$body.="\t";
	$body.=$fetch['msg'];
	$body.="\n";
	$subject = "Query Details";
	$mail_to = "steppingstone.ngo@gmail.com";
	$headers = 'From:'. $fetch['email'] ;
	mail($mail_to,$subject,$body,$headers);
	header('Location:contactus.php?msg=added2');
}
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
if($req=='added2')
{
	$regcontact=mysql_query("select max(id) as qid from contactdet");
	$result=mysql_fetch_array($regcontact);
	$sql=mysql_query("select * from contactdet where id=".$result['qid']);
	$fetch=mysql_fetch_array($sql);
	$body = "Dear Mr/Ms " ;
	$body.= $fetch['cname'];
	$body.="\n";
	$body .= "Welcome to myjobhouse.com . We will get back to you as soon as possible. !";
	$body.="\n";
	$body.="\n";
	$body.="Regards,";
	$body.="\n";
	$body.="Relationship Team";
	$body.="\n";
	$body.="myjobhouse.com";
	$body.="\n";

	$subject = "Query Submission Confirmation";
	$mail_to = $fetch['email'];
	$headers = 'From: gemsindiajobhouse@gmail.com';
	mail($mail_to,$subject,$body,$headers);
    header('Location:contactus.php');
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
			function isNumeric(elem,helpMsg)
			 {
			  	var numericExpression=/^[0-9]+$/;
				 if(elem.value.match(numericExpression))
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

			 function isMadeSelection(elem,helpMsg)
			{
 				if(elem.value=="years")
				{
					alert(helpMsg);
					 elem.focus();
					return false;
 				}
				 else
 				{
					 return true;
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
           function valid(elem,helpMsg)
			{
			  if(elem.value.length==0)
			   {

				alert(helpMsg);
				elem.focus();
				return false;
			   }
			   else
			       {
                   var extension=elem.value.substr(elem.value.lastIndexOf('.')+1).toLowerCase();
                 //alert(extension);
                     if(extension=='xls' || extension=='xlsx' || extension=='pdf')
					 {
			         return true;
					 }
					 alert("Please Upload xls/xlsx/pdf File");
				     elem.focus();
				     return false;
			      			    }
			}
			function validateform()
			{
			var nam=document.getElementById('nm');
 			var emailid=document.getElementById('email');
                         var contno=document.getElementById('contno');

			var sel=document.getElementById('experience');
                        var fi=document.getElementById('file');

			var txtmsg=document.getElementById('msg');
			if(notEmpty(nam,'Please Enter Name'))
			  if(isAlphabat(nm,'Please enter a valid name'))
                          if(notEmpty(emailid,'Please Enter Email Id'))
                           if(emailValidator(emailid,'Please use Valid Email Id'))
		  		 if(isMadeSelection(sel,'Please Select Experience'))
                                  if(valid(fi,'Please upload current imates status'))
				    if(notEmpty(txtmsg,'Text box Blanked'))


                            return true;
			   return false;

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
<div id="matter">
<div id="content" style="background-color:#FFFFFF;">

<div class="contact">
<h2>Contact Form</h2><br/><br/>
	<form action="contactus.php?action=add"  onsubmit="return validateform();" method="post" >
    <table>
    <tr><td class="tex_td1">
    Name:</td>          <td><input type="text" class="text_box" id="nm" name="cname" size=15 title="Use Alphabet" placeholder="Enter Name" ></td></tr>
<tr><td class="tex_td1">
   Email Id:</td>          <td><input type="text" id="email" class="text_box" name="email" size=15 title="Use Mail Id" style="margin-top:15px;" placeholder="Enter Email Id"></td></tr>
<tr><td class="tex_td1">
  Message:</td>          <td><textarea cols="17" rows="2" class="text_box" name="msg" id="msg" style="vertical-align:middle;margin-top:15px;"></textarea>
</td></tr>
<tr><td >&nbsp;</td><td><input type="submit" value="Send Message" class="myButton2" style="margin-top:10px;">  <input type="reset"  value="Reset" class="myButton3" style="margin-top:10px; "></td></tr>
          </table>
 </form>
 </div>

<div class="contact">
<h2 style="background-color:#c62d1f; color:#FFFFFF; width:250px; border-radius:0px 10px 10px 0px; font-size:24px; padding-left:30px;">Office</h2><br/><br/>
<p class="p1">
<b style="margin-right:20px;">Address:</b>Dept. of Computer Science<br/>
<p class="p1" style="margin-left:80px;"> Christ University<br/> Hosur Road<br/> Bengaluru<br/>
Karnataka</p><br/>
<b style="margin-right:20px;">Phone:</b> +91 976-0903-555 (Head Office), <br/>
<p style="margin-left:80px;">  +91 944-904-4329 (Office)</p><br/>
<b style="margin-right:20px;">E-mail:</b> steppingstones.ngo@gmail.com <br/> <br/>
<b style="margin-right:20px;">Website:</b><a href="http://www.steppingstone.com" style="text-decoration:none; color:#333333;">www.steppingstones.com</a></p><br/>
</div>
<iframe src="https://www.google.com/maps/embed/v1/place?q=Christ+University,+Bengaluru,+Karnataka,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU" width="70%" height="350px" frameborder="0" style=" margin-top:35px; float:left; margin-bottom:30px; margin-left:15%" allowfullscreen></iframe>



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
