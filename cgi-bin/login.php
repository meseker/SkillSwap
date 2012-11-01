<?php

if($_POST)
{
	$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');
	
	$user = mysql_query("SELECT * FROM Users WHERE email='" . $_POST["email"] . "'");
	if($row=mysql_fetch_array($user))
	{
		$salt = mysql_query("SELECT * FROM Saltine WHERE saltID='1'");
		$salt_row = mysql_fetch_array($salt);
		$password_attempt = crypt($_POST['password'], $salt_row['salt_string']);
		if($password_attempt == $row['password'])
		{
			header('Location: http://www.stanford.edu/~meseker/cgi-bin/WWW/cgi-bin/profile.php');
			exit();
		} else {
			//echo "User name or password is incorrect.";
		}
	} else {
		//echo "User name or password is incorrect.";
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