<?php
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{	
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		require_once 'config.php';
			
		$user = mysql_query("SELECT * FROM Users WHERE email='$email'");
		
		$result = mysql_fetch_array($user);
		
		$salt = $result['salt'];
	
		$hashedPW = crypt($password,$salt);
		
		if($result['password'] == $hashedPW )
		{
			session_start();
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged_in'] = "YES";
			$_SESSION['email'] = $email;
			echo "success";
		} 
	}
?>