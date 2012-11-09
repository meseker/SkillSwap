<?
	$_SESSION = array();
	session_unset(); 
	session_destroy();
	header("location : index.php");
	echo "You have successfully logged out!";
?>