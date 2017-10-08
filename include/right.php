<div id="right">
    <h2>Notifications</h2>
				<ul>
				<?php
include("admin/include/connect.php");
$ev_ar=mysql_query("select distinct(events) from orpupdate where events!='' and post_event=1 order by date asc");
$i=1;
while($fetch=mysql_fetch_array($ev_ar))
{
	?>
	 <li><a href="event.php"><?php echo $fetch['events']; ?></a></li><br>
	<?php
$i++;
}
?>
	</ul>
</div>
<!--end of right-->