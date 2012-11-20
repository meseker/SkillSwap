<?php

session_start();
require_once 'config.php';

if($_POST)
{
	$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');

	$senderID = mysql_real_escape_string($_POST['sender']);
	$sender = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . $senderID . "'"));
	$receiverID = mysql_real_escape_string($_POST['receiver']);
	$receiver = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . $receiverID . "'"));

	$subject = mysql_real_escape_string($_POST['subject']);
	$message = mysql_real_escape_string($_POST['message']);
	$past_page = mysql_real_escape_string($_POST['past_page']);
	if($sender && $receiver && (strlen($subject) > 0) && (strlen($message) > 0))
	{
		$query = "INSERT INTO Mail (EmailFrom, EmailTo, Message, Subject) VALUES ('" . $senderID ."', '" . $receiverID . "', '{$message}', '{$subject}')";
		if(mysql_query($query))
		{
			$_SESSION['notice'] = "<p class='success'> Message sent! </p>";
			//echo "success";
		}
		else
		{
		$_SESSION['notice'] = "<p class='error'> Message was not sent. Query related.</p>"; 
		//echo "failure";
		}
	}
	else
	{
	$_SESSION['notice'] = "<p class='error'> Message was not sent. Something missing.</p>";
	//echo "failure";
	}
	header( "Location: " . $past_page );
}
?>