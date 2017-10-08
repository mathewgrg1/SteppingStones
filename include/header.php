<div id="header">
<div id="logo">
<img src="images/logo.png" style="height:80px; width:110px; padding-top:10px;" />
</div>
<!--end of logo-->
<div id="title">
Stepping Stones<br /><p style="font-size:18px;">Beginning of hope</p></div>
<div id="icon">
<ul>
						<li><a href="https://www.facebook.com/Stepping-Stones-581605358686038/"><img src="images/fb.png" alt=""></a></li>
						<li><a href="https://www.linkedin.com/in/"><img src="images/linkedin.png" alt=""></a></li>
						<li><a href="https://plus.google.com/u/0/116879645468553821115"><img src="images/google.png" alt=""></a></li>
						<li><a href="https://www.youtube.com/channel/UCNbXd2ZyvxBOCKwm3P08fFw"><img src="images/youtube.jpg" alt=""></a></li>
</ul>
</div>
<!--end of icon-->
</div>
<!--end of header-->
<div id="menu">
<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="team.php">Team</a></li>
							<li><a href="orphanages.php?mode=show_orphanages">Orphanages</a></li>
							<li><a href="gallery.php">gallery</a></li>
							<li><a href="helpus.php">Help us</a></li>
							<li><a href="contactus.php">Contact</a></li>

							<?php if(isset($_SESSION['user']))
						{

								echo '
								<li><a href="ulogout_exec.php">'.$_SESSION['user'].' <span style="font-size: 12px">(Logout)</span></a></li>
							';
								}
								else
								{
									echo '<li><a href="reg_login.php">Register/Login</a></li>';
								}
							?>


</ul>
</div>
<!--end of menu-->
