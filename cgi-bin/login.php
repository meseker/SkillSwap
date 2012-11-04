<?php
<<<<<<< HEAD

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
=======
$username = $_POST["username"];

$query = "SELECT * FROM Users WHERE email="+$username;

$user = mysql_query($query) or die(mysql_error());
//still need to sanitize input to prevent our tables from being cleared...
//cost a bit more time to implement, we'll wait till later
$entered_password = $_POST["password"];

// We check the user-entered password against the one
// saved and retrieved above. If it matches, the user is logged in.
if (crypt($entered_password, $user['salt']) == $user['password']) {
   session_regenerate_id();
   
   $_SESSION['SESS_MEMBER_ID'] = $user['userId'];
   
   session_write_close();
   header("location : index.php");
   exit();
}
else{
	header("location : index.php");
}
?>
<script src="https://gist.github.com/3937494.js?file=login.php"></script>
>>>>>>> 0b0bfe3bbfff433135aed171a76f00e8f1fdc30b
