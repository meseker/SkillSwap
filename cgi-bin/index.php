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
		<a href="findlisting.php" data-role="button"> Find a Teacher! </a>
	</div>
</div>
<div data-role="popup" id="login_popup" data-overlay-theme="b" data-theme="a" class="ui-corner-all" data-position-to="window" data-dismissable="false">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="exit-icon" data-iconpos="notext" class="ui-btn-left">Close</a>
	    <form id="login" class="login" action="" value="login" method="post">
		      <div style="padding:10px 20px;">
			  <h3>Please sign in</h3>
		      <label for="un" class="ui-hidden-accessible">Username:</label>
		      <input type="text" name="email" id="un" value="" placeholder="user@email.com" data-theme="a" />

	          <label for="pw" class="ui-hidden-accessible">Password:</label>
	          <input type="password" name="password" id="pass" value="" placeholder="password" data-theme="a" />

	    	  <button type="submit" value="login data-theme="b">Login</button>
			</div>
		</form>
</div>
<?php

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
=======
	}
?>
</body>
>>>>>>> ddf6c59ded9996f36199ee6563ea7bad8e20b56c
</html>