<?php
session_start();
if(!isset($_SESSION['user']))
	header("location: user_login.php");
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
	function validateform()
	{
		if(donate.amount.value<500)
		{
			alert("Minimum amount is Rs. 500");
			donate.amount.focus();
			return false;
		}
		else
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
<div id="matter">
<div id="content" style="background-color:#FFFFFF;">
<article class="col1" style="margin-left: 120px;width:700px; float:left;">
						
		<form action="pay.php?type=Donation" enctype="multipart/form-data" onSubmit="return validateform();" method="post" name="donate">
		<br /><br /><br /><br /><br /><br /><br /><br />
		<h2>Donate</h2><br><br />
				<table width="100%" align="center">

<tr><td class="tex_td">Purpose</td>
<td>
	<select class="text_box2" name="purpose" required>
		<option value="">--Select--</option>
		<option value="Basics">Basics</option>
		<option value="Education">Education</option>
		<option value="Food">Food</option>
		<option value="General">General</option>
		<option value="Health">Health</option>
	</select>
</td></tr>

<tr><td class="tex_td">Amount</td>
<td><input name="amount" class="text_box2" type="number" maxlength="20" required /></td></tr>
<tr><td class="tex_td">Comments</td>
<td><textarea class="text_box2"></textarea></td></tr>

</table>
<br />
<div style="text-align:center;">


<input name="Submit" type="submit" value="Proceed to pay" class="myButton"/>
<br>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
									
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