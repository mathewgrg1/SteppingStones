<?PHP
	ob_start();
	@session_start(); 
	$host="localhost";
	$user="ss_admin";
	$password="letssadin";
	$con=mysql_connect($host,$user,$password);
	mysql_select_db("stepping_stones",$con);
	if(!$con)
		{
		 die('Could not connect: ' . mysql_error());
		}
?>

