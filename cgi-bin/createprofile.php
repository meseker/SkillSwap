<?php
	session_start();
?>
<html>
<head>
	<?php include 'head.php'?>
</head>
<body>
<?php
	include 'header.php';
?>
	<div id="first_layer_profile">
		<h1 id="profile_header">Edit User Profile</h1>
	</div>
	<div id="mini_nav">
		<ul style="list-style-type:none;float:left;">
			<li>Hi, NAME</li>
		</ul>
	</div>
	<div id="profile_wrapper">
		<div style="padding-left:10px;padding-bottom:10px;"><a href="profile.php">Save</a></div>
		<div id="second_layer_profile">
			<div id="user_pic_container"><img src="user.png" id="user_pic" /></div>
			<div id="personal_info_container">
				<table id="personal_info">
					<tr><td><a href="#">Upload Photo</a></td></tr>
					<tr><td>EDIT PROFILE INFO</td></tr>
				</table>
			</div>
		</div>
		<br /><br />
		<div id="third_layer_profile">
			<div class="lesson_info_container">
				<table class="lesson_info">
					<tr><td>EDIT PROFILE INFO</td></tr>
				</table>
			</div>
		</div>
		<div id="fourth_layer_profile">
			<div id="availability_info_container">
				<table id="availability_info">
					<tr><td>EDIT CALENDAR</td></tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>