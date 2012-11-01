<div data-role="header">
<?php
	/* Using this database
	 * Database info
	 * servername = mysql-user-master.stanford.edu
	 * username = ccs147meseker
	 * password   = ceivohng
	 * database = c_cs147_meseker 
	 */
	mysql_connect("mysql-user-master.stanford.edu", "ccs147meseker", "ceivohng") or die(mysql_error());
	mysql_select_db("c_cs147_meseker") or die(mysql_error());

	// Get a specific result from the "example" table

	if(!isset($_SESSION['SESS_MEMBER_ID']) || trim($_SESSION['SESS_MEMBER_ID']) == '')
	{
		//create the "login" and underneath "create_profile" form
		echo '<a href="#login" data-rel="popup" class="ui-btn-left"> Login </a>';
	}
		else
		{
			$query = "SELECT * from Users Where userId='".$_SESSION['SESS_MEMBER_ID']."'";
			$user = mysql_query($query) or die(mysql_error());
			echo "<div class='ui-btn-left' style='float:left'><p><a href='profile.php'>".$user[name]."</a></p>";
			echo "<small><p><a href='#logout'> logout </a></p></small></div>";
		}
?>
	<h1>Skill Searcher</h1>
	<a href="index.php" id="home" data-icon="custon" class="ui-btn-right" style='float:right;margin-right:30px'> </a>
	<a href="mail.php" id="email" data-icon="custom" class="ui-btn-right" style='float:right'> </a>
</div>

<div data-role="popup" id="login.php" data-transition="slidedown" data-position-to="window" data-shadow="true" data-history="true">
	<form action="login" method="post">
		<label for="username">Username:</label>
		<input type="text" name="username" id="user">
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<input type="submit" value="Login">
	</form>
</div>
