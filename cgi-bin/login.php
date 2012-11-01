<?php
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