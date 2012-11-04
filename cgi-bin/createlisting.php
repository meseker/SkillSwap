<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	die("To access this page, you need to <a href='index.php'>LOGIN</a>");
}
?>
<html>
<head>
<<<<<<< HEAD
    <title>Skill Searcher</title>
    <link rel="Stylesheet" rev="Stylesheet" href="css/main.css" /> 

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
=======
	<?php include 'head.php'?>
</head>
<body>
<?php
	include 'header.php';
?>
<?php
>>>>>>> 0b0bfe3bbfff433135aed171a76f00e8f1fdc30b
if($_POST)
{
	$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');
	
	$email = mysql_real_escape_string($_SESSION['email']);
	$user = mysql_fetch_array(mysql_query("SELECT userID FROM Users WHERE email='{$email}'"));
	$userID = $user['userID'];
	
	$skillName = mysql_real_escape_string($_POST['skillName']);
	$skill = mysql_fetch_array(mysql_query("SELECT skillID FROM skills WHERE skillName='" . $skillName . "'"));
	$skillID = NULL;
	if(!$skill)
	{
		mysql_query("INSERT INTO skills (skillName) VALUES ('" . $skillName . "')");
		$skill = mysql_fetch_array(mysql_query("SELECT skillID FROM skills WHERE skillName='" . $skillName . "'"));
	}
	$skillID = $skill['skillID'];
	$lesson_description = mysql_real_escape_string($_POST['lesson_description']);
	$experience = mysql_real_escape_string($_POST['experience']);
	$cost = mysql_real_escape_string($_POST['cost']);
	if(mysql_query("INSERT INTO Lessons (userID,lesson_description,experience,cost,skillID) VALUES ('" . $userID . "','" . $lesson_description . "','" . $experience . "','" . $cost . "','" . $skillID . "')"))
	{
		$_SESSION['notice'] = "Listing created!";
		$_SESSION['wait_for_redirect'] = "WAIT!";
		echo "<script>$(function(){window.location.href='http://www.stanford.edu/~meseker/cgi-bin/WWW/cgi-bin/profile.php'});</script>";
	} else {
		$_SESSION['notice'] = "You messed up somewhere";
	}
}
?>
<div data-role="header" class="ui-header ui-bar-a header_extra_style">
	<center>
		Skill Searcher
	</center>
</div>
<div id="navigation_bar">
	<!--This div will be responsible for holding the username/logout, or the login_in if they are not logged in-->
	<div data-role="navbar">
		<ul>
			<li><a href="index.php" id="home" data-icon="home-icon">Home</a></li>
			<li><a href="mail.php" id="email" data-icon="mail-icon">Mail</a></li>
			<li><a href="profile.php" data-icon="custom">Profile</a></li>
		</ul>
	</div>
</div>
<div class="notice_top">
<?php
	if(isset($_SESSION['notice']))
	{
		echo $_SESSION['notice'];
		if(!$_SESSION['wait_for_redirect']) unset($_SESSION['notice']);
	} else echo "&nbsp;";
?>
</div>
<br>
<form action="createlisting.php" method="post">
	<div style="padding:10px 20px;">
		<h3>Create Listing</h3>
        <label for="sk" class="ui-hidden-accessible">Skill</label>
        <input type="text" name="skillName" id="sk" value="" placeholder="Skill" />
		<br />
		<label for="ld" class="ui-hidden-accessible">Lesson Description</label>
        <textarea cols="40" rows="8" name="lesson_description" id="ld" value="" placeholder="Lesson Description"></textarea>
        <br />
		<label for="exp" class="ui-hidden-accessible">Experience</label>
        <textarea cols="40" rows="8" name="experience" id="exp" value="" placeholder="Experience"></textarea>
		<br />
		<label for="cst" class="ui-hidden-accessible">Cost Per Hour</label>
        <input type="text" name="cost" id="cst" value="" placeholder="Cost Per Hour"  />
		<br />
		<div class="profile_option">
			<button type="submit" data-theme="b">CREATE</button>
		</div>
	</div>
</form>
</body>
</html>