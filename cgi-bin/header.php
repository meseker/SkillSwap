<div data-role="header" class="ui-header ui-bar-a header_extra_style">
	<center>
		Skill Searcher
	</center>
</div>

<!--This div will be responsible for holding the username/logout, or the login_in if they are not logged in-->
<div data-role="navbar">
	<ul>
		<li><a href="index.php" id="home" data-icon="home-icon" class="ui-btn-active">Home</a></li>
		<?php
		if(isset($_SESSION['logged_in']))
		{
			//echo "<li><a href='mail.php' id='email' data-icon='mail-icon'>Mail</a></li>";
			echo "<li><a href='profile.php' data-icon='custom' id='profile'>";
			echo "Profile</a></li>";
		}
		else
		{
			echo "<li><a href='#login_popup' data-icon='custom' data-rel='popup'";
			echo "data-transition='flip' id='login_button'>Login</a></li>";
			/*echo "<li><a href='createprofile.php' data-icon='custom' data-rel='popup'";
			echo "data-transition='flip' id='register_button'>Register</a></li>";*/
		}
	?>
	</ul>
</div>