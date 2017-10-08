<?PHP
date_default_timezone_set("Asia/Kolkata");
$today=date('Y-m-d ');
session_start();
include ('include/connect.php');
$sql=mysql_query("insert into logbook (date,userid,category,task) values('".$today."','".$_SESSION['user_id']."','logout','".$_SESSION['user']." logout')");
session_destroy();
header("Location:index.php");
?>