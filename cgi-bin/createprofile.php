<?php
	session_start();
?>
<html>
<head>
	<?php include 'head.php';
	?>
</head>
<body>
<?php
	include 'header.php';
?>
<br><br>
<div id="content">
	<form id='register' action='createprofile.php' method='post' accept-charset='UTF-8'>
	<fieldset >
		<legend> Register below!</legend>
		<input type='hidden' name='submitted' id='submitted' value='1'/>
		<label for='first_name' >First name: </label>
		<input type='text' name='first_name' id='first_name' maxlength="50" />
		<label for='first_name' >Last name: </label>
		<input type='text' name='last_name' id='last_name' maxlength="50" />
		<label for='email' >Email Address*:</label>
		<input type='text' name='email' id='email' maxlength="50" />
		<label for='password' >Password*:</label>
		<input type='password' name='password' id='password' maxlength="50" />
		<label for='confirm_password' >Verify Password*:</label>
		<input type='password' name='confirm_password' id='confirm_password' maxlength="50" />
		<input type='submit' name='Submit' value='Submit' />
	</fieldset>
</form>
<?php
	//add the validator
	require_once "formvalidator.php";
	$validator = new FormValidator();
	$validator->addValidation('password','eqelmnt=confirm_password','Your passwords do not match!');
	$validator->addValidation('mail','email','The input for Email should be a valid email value');
	$validator->addValidation('email','req','Please fill in an Email, this will be your username');	
	
	if($_POST){
		mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
		mysql_select_db('c_cs147_meseker');
	
		$name = sanitize($_POST['first_name'])." ".sanitize($_POST['last_name']);
		$user_name = sanitize($_POST['username']);
		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);
	
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		echo $salt."<br><br>";
		$hash = crypt($password.$salt);
		echo $hash."<br><br>";
		$user = mysql_fetch_array( mysql_query("SELECT * FROM Users WHERE email='" . $email . "'"));
	
		if (!($fetch = mysql_fetch_array( mysql_query("SELECT email FROM Users WHERE email='$email'")))){
			mysql_query("INSERT INTO Users (name, password,salt,email) VALUES ('$name', '$hash', '$salt', '$email')") or die(mysql_error());
		}
		else{
			echo "Sorry! $email is already in the base";
			//go ahead and show an error, get them to resubmit
		}
	}
	
	function sanitize($query){
		return mysql_real_escape_string($query);
	}
?>
</div>
</body>
</html>