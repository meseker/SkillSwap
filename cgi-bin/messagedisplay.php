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
<br><br>
<div id="second_layer_message_display">
	<?php
		require_once 'config.php';
		if($_POST)
		{
			$subject = mysql_real_escape_string($_POST['Subject']);
			$message = mysql_real_escape_string($_POST['Message']);
			echo "<div id='message_header_container'>";
			echo "<div id='message_header'>";
			if($_POST['EmailTo'])
			{
				$emailTo = mysql_real_escape_string($_POST['EmailTo']);
				$receiver = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . $emailTo . "'"));
				echo "<div class='message_content_header' style='float:left;'>To: </div>";
				echo "&nbsp;&nbsp;" . $receiver['name'];
			}
			else
			{
				$emailFrom = mysql_real_escape_string($_POST['EmailFrom']);
				$sender = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . $emailFrom . "'"));
				echo "<div class='message_content_header' style='float:left;'>From: </div>";
				echo "&nbsp;&nbsp;" . $sender['name'];
			}
			echo "<br/>";
			echo "<br/>";
			echo "<div class='message_content_header' style='float:left;'>Subject: </div>";
			echo "&nbsp;&nbsp;<strong>" . $subject . "</strong>";
			echo "</div>";
			echo "</div>";
			echo "<div id='message_body_container'>";
			echo "<div id='message_body'>";
			echo "<div class='message_content_header'>Message:</div>";
			echo "<br/>";
			echo $message;
			echo "</div>";
			echo "<div style='width:95%;margin:auto;'><a href='#' data-role='button'>Reply</a></div>";
			echo "<br/>";
			echo "</div>";
		}

	?>
</div>
</body>
</html>