<?php
	session_start();
	require_once 'config.php';
	$is_ajax = $_REQUEST['is_ajax'];
	if($is_ajax)
	{	
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
			
		$user = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE email='$email'"));
		
		$salt = $user['salt'];
	
		$hashedPW = crypt($password,$salt);
		
		if($user['password'] == $hashedPW )
		{
			$_SESSION['name'] = $user['name'];
			$_SESSION['logged_in'] = "YES";
			$_SESSION['userID'] = $user['userID'];
			$_SESSION['login_results'] = "<p class='success'> Login Success </p>";
			echo "success";
		} 
		else
			{
				$_SESSION['login_results'] = "<p class='error'> Wrong username/password </p>";
			}
	}
	else
		echo "failure";
?>