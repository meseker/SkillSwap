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
	if($_POST)
	{	
		require_once 'config.php';
		
		$email = mysql_real_escape_string($_POST['email']);
		echo $email;
		
		$user = mysql_query("SELECT * FROM Users WHERE email='$email'");
		
		$result = mysql_fetch_array($user);
		
		$salt = $result['salt'];
		$password = mysql_real_escape_string($_POST['password']);
		$password = $password . $salt;
	
		$hashedPW = crypt($password);
	
		if($user['password'] == $hashPW )
		{
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged_in'] = "YES";
			$_SESSION['email'] = $email;
			header( 'Location : profile.php' ) ;
		} else {
			header( 'Location : index.php' ) ;
			echo "User name or password is incorrect.";			
		}
	}
?>
</body>
</html>