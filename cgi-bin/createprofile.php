<?php 
	include 'header.php';
	?>
<br><br>
	<form action="post" method="post" id="reg_form" name="reg_form">
		<div style="padding:10px 20px;">
		  <h3>Register below to get access to local teachers</h3>
		  <label for="firstname_reg">First Name:</label>
		  <input type="text" name="firstname_reg" id="firstname_reg" value="" placeholder="firstname_reg" data-theme="a" />

		  <label for="lastname_reg">Last Name:</label>
		  <input type="text" name="lastname_reg" id="lastname_reg" value="" placeholder="lastname_reg" data-theme="a" />

		  <label for="email_reg">Email:</label>
		  <input type="text" name="email" id="email_reg" value="" placeholder="username" data-theme="a" />

		  <label for="pw">Password:</label>
		  <input type="password" name="pass1_reg" id="pass1_reg" value="" placeholder="pass1_reg" data-theme="a" />
		   
		  <label for="pass2_reg">Confirm Password:</label>
		  <input type="password" name="pass2_reg" id="pass2_reg" value="" placeholder="pass2_reg" data-theme="a" />
		  
		  <button type="submit" data-theme="b">Sign up</button>
		  </div>
	</form>
<script type="text/javascript">
	var frmvalidator  = new Validator("reg_form");
	frmvalidator.addValidation("email_reg","req","Please enter in an email");
	frmvalidator.addValidation("email_reg","regexp\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b","Please enter in a valid email");
 
	frmvalidator.addValidation("pass1_reg","eqelmnt=pass2_reg", "Sorry, your password and password confirmation don't match");
</script>

<?php
if($_POST)
{
	$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');
	$email = mysql_real_escape_string($_POST['email_reg']);
	$first_name = mysql_real_escape_string($_POST['firstname_reg']);
	$last_name = mysql_real_escape_string($_POST['lastname_reg']);
	$password = mysql_real_escape_string($_POST['pass1_reg']);
	
	$user = mysql_query("SELECT * FROM Users WHERE email='" . $email . "'");
	if($row=mysql_fetch_array($user))
	{
		$salt = mysql_query("SELECT * FROM Saltine WHERE saltID='1'");
		$salt_row = mysql_fetch_array($salt);
		$password = mysql_real_escape_string($_POST['password']);
		$password_attempt = crypt($password, $salt_row['salt_string']);
		if($password_attempt == $row['password'])
		{
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged_in'] = "YES";
			echo "<script>$(function(){window.location.href='http://www.stanford.edu/~meseker/cgi-bin/WWW/cgi-bin/profile.php'});</script>";
		} else {
			echo "User name or password is incorrect.";
		}
	} else {
		echo "User name or password is incorrect.";
	}
	
	}
?>
</body>
</html>