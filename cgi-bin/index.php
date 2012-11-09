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
			  <h3>Please Login</h3>
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
		//echo $email;
		
		$user = mysql_query("SELECT * FROM Users WHERE email='$email'");
		
		$result = mysql_fetch_array($user);
		echo $result['password'] . "<br/>";
		echo $result['salt'] . "<br/>";
		$salt = $result['salt'];
		$password = mysql_real_escape_string($_POST['password']);
		//$password = $password . $salt;
		//echo $password . "<br/>";
		$hashedPW = crypt($password, $salt);
		echo $hashedPW . "<br/>";
		if($result['password'] == $hashedPW )
		{
			$_SESSION['name'] = $result['name'];
			$_SESSION['logged_in'] = "YES";
			$_SESSION['email'] = $email;
			//header( 'Location : profile.php' ) ;
			echo "<script>$(function(){window.location.href='profile.php'});</script>";
		} else {
			//header( 'Location : index.php' ) ;
			echo "User name or password is incorrect.";			
		}
	}
?>
</body>
<footer>
<?php
	if(isset($_SESSION['logged_in']))
	{
	echo "<a href='logout.php' data-role='button' data-iconpos='right' id='logout'>";
    echo "Logout";
    echo "</a>";
	}
	?>
</footer>
</html>