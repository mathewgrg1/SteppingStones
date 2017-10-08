<?php
include("admin/include/connect.php");
if(isset($_SESSION['user']))
	{
		header("Location:index.php");
	}
else
{
		$query=mysql_query("select * from uregister where u_email='" .$_POST['Email_id']. "' and password='" .$_POST['p_word'] ."'");
	$rows = mysql_num_rows($query);
	if($rows==0)
		{
			$error = 'Login Id or Password is incorrect !!';
			header('Location:user_login.php?Login_failed');
		}
	else
		{ 
		$fetch=mysql_fetch_array($query);
		if($fetch['password']==$_POST['p_word'])
			{	
				$_SESSION['user'] = $fetch['f_name'];
				$_SESSION['user_id'] = $fetch['u_id'];
		header('Location:index.php');
		$sql=mysql_query("insert into logbook (date,userid,category,task) values('".$today."','".$_SESSION['user_id']."','login','".$_SESSION['user']." login ')");
			}
		else
			{
				$error ='Login Id or Password is incorrect !!';
			}
		}
}
?>