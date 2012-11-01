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
<div id="header">
	<center>
		Skill Searcher
	</center>
</div>

Database info

servername = mysql-user-meseker.stanford.edu
username = ccs147meseker
password   = ceivohng
database = c_cs147_meseker

<div id="navigation_bar">
	<!--This div will be responsible for holding the username/logout, or the login_in if they are not logged in-->
	<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="index.html" id="home" data-icon="custom" class="ui-btn-active">Home</a></li>
			<li><a href="mail.html" id="email" data-icon="custom">Mail</a></li>
		</ul>
	</div>
</div>
<br> <br>

<div id="content">
	<div id="control_panel" data-role="controlgroup" data-type="vertical">
		<a href="createlisting.html" data-role="button"> Create Listing! </a>
		<a href="categories.html" data-role="button"> Find a Teacher! </a>
	</div>
</div>

</body>
</html>