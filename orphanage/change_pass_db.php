
<?PHP
			include("include/connect.php");			
			$oldpass=$_POST['old_pass'];
			
			$newpass=$_POST['new_pass'];
			
			$confpass=$_POST['confirm_pass'];
			
		 if(empty($oldpass)||empty($newpass)||empty($confpass))
		 		{
				$_REQUEST['empty']="empty";
				include("change_password1.php");
				exit;
				}
			
				if($oldpass!="" && $newpass!="" && $confpass!="")
				{
				
				  if($newpass==$confpass)
				  {
				    $query = mysql_query("select name from o_details where orpPass='$oldpass' and id='".$_SESSION["orphanageid"]."'");
				  
				  	if(mysql_affected_rows()>0)
					{
					$update=mysql_query("update o_details set orpPass='$newpass' where orpPass='$oldpass' and id='".$_SESSION["orphanageid"]."'");
					
					 if(mysql_affected_rows()>0)
					 {
					 $_REQUEST['change']="change";
					 include("change_password1.php");
					 exit;
					 }
					}
					 else
					 {
					   $_REQUEST['notold']="notold";
					 include("change_password1.php");
					 exit;
					 }
				  }
				  else
				  {
				$_REQUEST['notmatch']="notmatch";
				include("change_password1.php");
				exit;
				  }
				}
	
	?>