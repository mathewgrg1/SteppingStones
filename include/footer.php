<div id="footer">
<?php
include("admin/include/connect.php");
	$sql=mysql_query("select max(count) as mcount from counter ");
	$fetch=mysql_fetch_array($sql);
?>
<p style="font-size:20px; color:#FF0000"> Total Visitors <?php echo $fetch['mcount'] ?></p>
<div id="call">
<div id="call2"></div>
<div id="call3"></div>
</div>
<!--end of call-->

<p>&copy; Stepping stones</p>

<!--end of footer-->

