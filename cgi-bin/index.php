<?php
	session_start();
?>
<html>
<head>
	<?php include 'head.php'?>
</head>
<body>
<?php
	include 'header.php';
?>
<br> <br>
<br> <br>
<center>
<div id="	"> </div>
</center>
<div id="home_options_container">
	<div id="home_options">
		<a href="createlisting.php" data-role="button"> Create Listing! </a>
		<br />
		<a href="findlisting.php" data-role="button"> Find a Teacher! </a>
	</div>
</div>
<div data-role="popup" id="login_popup" data-overlay-theme="b" data-theme="a" class="ui-corner-all" data-position-to="window" data-dismissable="false">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" style=" float:left;">Close</a>
	    <form id="login_form" class="login_form" action="login.php" value="login" method="post">
		      <div style="padding:10px 20px;">
			  <h3>Please sign in</h3>
		      <label for="email" class="ui-hidden-accessible">Username:</label>
		      <input type="text" name="email" id="email" id="un" placeholder="user@email.com" data-theme="a" />

	          <label for="password" class="ui-hidden-accessible">Password:</label>
	          <input type="password" name="password" id="password"  placeholder="password" data-theme="a" />

	    	  <input type="submit" id="login" name="login" value="login"></input>
			</div>
		</form>
</div>
<script type="text/javascript">
$(function(){	
	$("#login").click(function() {
		var action = $("#login_form").attr("action");
		var form_data = {
			email : $("#email").val(),
			password : $("#password").val(),
			is_ajax: 1
		};
		$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response) {
					if( response == "success")
					{
						$("#message").html("<p class='success'> You have logged in successfully! </p>");
					}
					else
					{
						$("#message").html("<p class='error'>Invalid username and/or password. </p>");
					}
				}
			});
			return false;
	});
});
</script>
</body>
</html>