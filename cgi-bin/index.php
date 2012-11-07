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
/* OLD LOGIN CODE
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
*/
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