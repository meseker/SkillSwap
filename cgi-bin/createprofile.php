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
</head>
<body>
<?php
	//header
	include 'header.php'; 
?>
<br><br>
	<div id="first_layer_profile">
		<h1 id="profile_header">Create Profile</h1>
	</div>
	<div id="mini_nav">
		<ul style="list-style-type:none;float:left;">
			<li><a href="index.html">Home</a></li>
		</ul>
		<ul style="list-style-type:none;float:right;padding-right:15px">
			<li style="display:inline;"><a href="#">Login</a></li>
		</ul>
	</div>
	<div id="second_layer_create_profile">
		<div id="create_user_pic_container">
			<img src="user.png" id="user_pic" style="float:left;padding:20px;"/>
			<div style="float:right;padding-top:80px;padding-right:100px;"><a href="#">Upload Photo</a></div>
		</div>
		</div>
	</div>
	<div id="third_layer_create_profile">
		<div id="create_personal_info_container">
			<table id="create_personal_info">
				<tr><td>ADD PERSONAL INFO</td></tr>
			</table>
		</div>
		<div id="create_experience_container">
			<table id="create_experience">
				<tr><td>ADD EXPERIENCE</td></tr>
			</table>
		</div>
	</div>
	<div id="fourth_layer_create_profile">
		<div id="create_calendar_container">
			<table id="create_calendar">
				<tr><td>ADD AVAILABILITY</td></tr>
			</table>
		</div>
	</div>
</body>
</html>