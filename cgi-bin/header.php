<html>
<head>
    <title>Skill Searcher</title>
    <link rel="Stylesheet" rev="Stylesheet" href="css/main.css" /> 
    <title>Skill Searcher</title> 
    <meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="gen_validatorv4.js" type="text/javascript"></script>
</head>
<body>
<div data-role="header">

<div data-role="header" class="ui-header ui-bar-a header_extra_style">
	<center>
		Skill Searcher
	</center>
</div>

<div id="navigation_bar">
	<!--This div will be responsible for holding the username/logout, or the login_in if they are not logged in-->
	<div data-role="navbar">
		<ul>
			<li><a href="index.php" id="home" data-icon="home-icon" class="ui-btn-active">Home</a></li>
			<li><a href="mail.php" id="email" data-icon="mail-icon">Mail</a></li>
			<?php
				if(isset($_SESSION['loggedin'])
				{	
					echo "<li><a href='profile.php' data-icon='custom' id='profile'>";
					echo "Profile</a></li>";
				}
				else{
					echo "<li><a href='#login_popup' data-icon='custom' data-rel='popup'";
					echo "data-transition='flip' id='login_button'>Login</a></li>";
				}
			?>
		</ul>
	</div>
</div>