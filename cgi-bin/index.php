<?php
session_start();
?>
<html>
<head>
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
	<script>
		$(function(){
			/*$("#login_button").click(function(){
				$("#login_popup").popup();
			}); */
		});
	</script>
</head>
<body>

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
			if(!isset($_SESSION['logged_in'])) 
				echo "<li><a href='#login_popup' data-icon='custom' data-rel='popup' data-transition='flip' id='login_button'>Login</a></li>";
			else echo "<li><a href='profile.php' data-icon='custom'>Profile</a></li>";
			?>
		</ul>
	</div>
</div>
<br> <br>
<br> <br>
<div id="home_options_container">
	<div id="home_options">
		<a href="createlisting.php" data-role="button"> Create Listing! </a>
		<br />
		<a href="categories.php" data-role="button"> Find a Teacher! </a>
	</div>
</div>
<?php
if($_POST)
{
	$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');
	$email = mysql_real_escape_string($_POST['email']);
	$user = mysql_query("SELECT * FROM Users WHERE email='" . $email . "'");
	if($row=mysql_fetch_array($user))
	{
		$salt = mysql_query("SELECT * FROM Saltine WHERE saltID='1'");
		$salt_row = mysql_fetch_array($salt);
		$password = mysql_real_escape_string($_POST['password']);
		$password_attempt = crypt($password, $salt_row['salt_string']);
		if($password_attempt == $row['password'])
		{
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged_in'] = "YES";
			$_SESSION['email'] = $email;
			echo "<script>$(function(){window.location.href='http://www.stanford.edu/~meseker/cgi-bin/WWW/cgi-bin/profile.php'});</script>";
		} else {
			echo "User name or password is incorrect.";
		}
	} else {
		echo "User name or password is incorrect.";
	}
	
}

/*$salt = mysql_query("SELECT * FROM Saltine WHERE saltID='1'");

if ($row=mysql_fetch_array($salt))
{
	$salt_string = $row['salt_string'];
	$password = "password";
	$encr_password = crypt($password, $salt_string);
	mysql_query("INSERT INTO Users (name, password, saltID, email) VALUES ('Meseker','" . $encr_password . "', 1, 'meseker@email.com')");

} */

?>
</body>
<footer>
	<div data-role="popup" id="login_popup" data-overlay-theme="b" data-theme="a" class="ui-corner-all" data-position-to="window" data-dismissable="false">
			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="exit-icon" data-iconpos="notext" class="ui-btn-left">Close</a>
			<form action="index.php" method="post">
				<div style="padding:10px 20px;">
				  <h3>Please sign in</h3>
		          <label for="un" class="ui-hidden-accessible">Username:</label>
		          <input type="text" name="email" id="un" value="" placeholder="username" data-theme="a" />

		          <label for="pw" class="ui-hidden-accessible">Password:</label>
		          <input type="password" name="password" id="pass" value="" placeholder="password" data-theme="a" />

		    	  <button type="submit" data-theme="b">Login</button>
				</div>
			</form>
		</div>
</footer>
</html>