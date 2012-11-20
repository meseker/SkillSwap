<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	//die("To access this page, you need to <a href='index.php'>LOGIN</a>");
	$_SESSION['login_results'] = "<p class='error'> You need to Login to view this page </p>";
	header( 'Location: index.php' ) ;
}
?>
<html>
<head>
	<?php include 'head.php'?>
</head>
<body>
<?php
	include 'header.php';
?>

<div data-role="controlgroup" data-type="horizontal">
	<a href="#" data-role="button" id="inbox_button">Inbox</a>
	<a href="#" data-role="button" id="outbox_button">Outbox</a>
	<!--<a href="#" data-role="button">Compose</a>-->
</div>

<br><br>

<div id="inbox">
	<?php
	require_once 'config.php';
	$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');
	$userID = mysql_real_escape_string($_SESSION['userID']);
	$user = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='{$userID}'"));
	//echo $user['email'];
	$all_inmail = mysql_query("SELECT * FROM Mail WHERE EmailTo='" . $userID . "'") or die(mysql_error());

	if (mysql_num_rows($all_inmail) == 0) {
		echo "You haven't got any messages to display";
	}
	?>

	<div id="content">

	<ul data-role="listview">
				<?php
				//$_SESSION['EmailTo'] = $row['EmailTo'];
				//$_SESSION['Subject'] = $row['Subject'];
				//$_SESSION['Message'] = $row['Message'];
				while ($row = mysql_fetch_assoc($all_inmail)) {
					//echo "emailto: " . $row['EmailTo'] . "emailfrom: " . $row['EmailFrom'];
					$sender = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . $row['EmailFrom'] . "'"));
    				echo "<form action='messagedisplay.php' method='post'>";
    				echo "<input type='hidden' name='EmailFrom' value='" . $row['EmailFrom'] . "'>";
    				echo "<input type='hidden' name='Subject' value='" . $row['Subject'] . "'>";
    				echo "<input type='hidden' name='Message' value='" . $row['Message'] . "'>";
    				echo "<button type ='submit' >";
    				echo "From: ";
    				echo $sender['name'];
    				echo "<br/> Subject: ";
    				echo $row['Subject'];
    				echo "</button>";
    				echo "</form>";
				}
				?>
		</ul>
	</div>
</div>

<div id="outbox" class="hide">
	
	<?php
	//$email = $_SESSION['email'];
	//$email = "shaurya@stanford.blah";
	
	$all_outmail = mysql_query("SELECT * FROM Mail WHERE EmailFrom='" . $userID . "'") or die(mysql_error());
	
	if (mysql_num_rows($all_outmail) == 0) {
		echo "You haven't got any messages to display";
	}
	?>

	<div id="content">

	<ul data-role="listview">
				<?php
				//$_SESSION['EmailTo'] = $row['EmailTo'];
				//$_SESSION['Subject'] = $row['Subject'];
				//$_SESSION['Message'] = $row['Message'];
				while ($row = mysql_fetch_assoc($all_outmail)) {
					$receiver = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . $row['EmailTo'] . "'"));
    				echo "<form action='messagedisplay.php' method='post'>";
    				echo "<input type='hidden' name='EmailTo' value='" . $row['EmailTo'] . "'>";
    				echo "<input type='hidden' name='Subject' value='" . $row['Subject'] . "'>";
    				echo "<input type='hidden' name='Message' value='" . $row['Message'] . "'>";
    				echo "<button type ='submit' >";
    				echo "To: ";
    				echo $receiver['name'];
    				echo "<br/> Subject: ";
    				echo $row['Subject'];
    				echo "</button>";
    				echo "</form>";
				}
				?>
		</ul>
	</div>
</div>


</body>
<footer>
	<script>
	 $(function() {
	 	$("#outbox_button").click(function() {
	 		if($("#outbox").hasClass("hide"))
	 		{
	 			$("#outbox").removeClass("hide");
	 			$("#inbox").addClass("hide");
	 		}
	 	});
	 	$("#inbox_button").click(function() {
	 		if($("#inbox").hasClass("hide")) 
	 		{
	 			$("#inbox").removeClass("hide");
	 			$("#outbox").addClass("hide");
	 		}
	 	});

	 });
	</script>
</footer>

</html>