<?php
	session_start();
?>
<html>
<head>
	<?php include 'head.php'?>
	<meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta property="og:title" content="Skill Searcher" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Skill Searcher" />
	<meta property="og:description" content="Search for new teachers. Search for new students. Connecting the education gap\
					is our founding policy" />
	<meta property="og:image" content="http://www.facebookmobileweb.com/hackbook/img/facebook_icon_large.png"/>

</head>
<body>
<?php
	include 'header.php';
?>
<br><br>
<div id="content">
	<form id='register' action='post' method='post'
    accept-charset='UTF-8'>
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
		<label for='confirm_password' >Confirm Password*:</label>
		<input type='confirm_password' name='confirm_password' id='confirm_password' maxlength="50" />
		<input type='submit' name='Submit' value='Submit' />
	</fieldset>
</form>
<?php
if($_POST)
{
	$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');
	
	$name = sanitize($_POST('first_name'))." ".sanitize($_POST('last_name'));
	$user_name = sanitize($_POST('username'));
	$user_email = sanitize($_POST('email'));
	$password = sanitize($_POST('password'));
	
	$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	$hash = hash("sha256", $salt.$password);

	$email = mysql_real_escape_string($_POST['email']);
	
	$user = mysql_fetch_array( mysql_query("SELECT * FROM Users WHERE email='" . $email . "'"));
	
	if (!($fetch = mysql_fetch_array( mysql_query("SELECT email FROM users WHERE `email`='$email'"))))
	{
		mysql_query("INSERT INTO 'Users' ('name', 'password','salt','email') '\
		VALUES ('$name', '$hash', '$salt', '$email')") or die(mysql_error());
	}
	else
	{
		echo "Sorry! $email is already in the base";
		//go ahead and show an error, get them to resubmit
	}
}
?>
</div>
<?php
	require_once 'form_validator.php';
	$validator = new FormValidator();
	$validator->addValidation("password", "eqelmnt=confirm_password","Your passwords do not match!");
	$validator->addValidation("Email","email","The input for Email should be a valid email value");
	$validator->addValidation("Email","req","Please fill in an Email, this will be your username");
?>
</body>
</html>