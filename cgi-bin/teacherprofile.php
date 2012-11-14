<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	//die("To access this page, you need to <a href='index.php'>LOGIN</a>");
	$_SESSION['login_results'] = "<p class='error'> You need to Login to view this page </p>";
	header( 'Location: index.php' ) ;
}
if(!$_GET['teacher_userID'] || !$_GET['lessonID'])
{
	$_SESSION['login_results'] = "<p class='error'> Can't go there directly. </p>";
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
<?php
$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
mysql_select_db('c_cs147_meseker');

if($_GET['teacher_userID'] && $_GET['lessonID'])
{
$teacher = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . $_GET['teacher_userID'] . "'"));
$lessons = mysql_query("SELECT * FROM Lessons WHERE userID='" . $teacher['userID'] . "' AND lessonID='" . $_GET['lessonID'] . "'");
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE userID='" . mysql_real_escape_string($_SESSION['userID']) . "'"));
?>
	<div id="profile_wrapper">
		<div class="notice_top">
			<?php
			if(isset($_SESSION['notice']))
			{
				echo $_SESSION['notice'];
				unset($_SESSION['notice']);
			} else echo "&nbsp;";
			?>
		</div>
		<form action="search.php" method="post" id="teacher_profile_search_bar">
			<div data-role="fieldcontain">
				<input type="search" name="skill_search" id="skill_search" value="" placeholder="Search..."/>
				<br/>
				<center>
				<!-- <button type="submit" data-theme="b">Search</button> -->
				</center>
			</div>
		</form>
		<div id="second_layer_teacher_profile">
			<div id="personal_info_container">
				<table id="personal_info">
					<tr><td id="teacher_name_header" colspan="2"><?php echo strtoupper($teacher['name']) ?></td></tr>
					<tr><td><a href="mailto:<?php echo $teacher['email'] ?>"><?php echo $teacher['email'] ?></a></td></tr>
					<tr><td style="padding-right:10px;"><a href="#message_popup" data-rel="popup" data-role="button">Message Me</a></td></tr>
				</table>
			</div>
			<!-- <div id="user_pic_container"><img src="user.png" id="user_pic" /></div> -->
		</div>

		<div id="third_layer_profile">
			<div class="lesson_info_container">
				<div class="lesson_info">
					<?php
					if($teacher)
					{
					if($row = mysql_fetch_array($lessons))
					{
						echo "<div class='teacher_section'>";
						echo "<div class='teacher_lesson_header'>Lesson Details</div><br/>";
						echo $row['lesson_description'] . "<br/><br/>";
						echo "<div class='teacher_lesson_header'>Experience</div><br/>";
						echo $row['experience'] . "<br/><br/>";
						echo "<div class='teacher_lesson_header'>Cost</div><br/>";
						echo $row['cost'];
						echo "</div>";
					}
					}
					?>
				</div>
			</div>
			<div class="also_teaches_container">	
				<div class="lesson_info">
					<?php
					if($_GET['teacher_userID'] && $_GET['lessonID'])
					{
						$lessons = mysql_query("SELECT * FROM Lessons WHERE userID='" . $_GET['teacher_userID'] . "' AND lessonID<>'" . $_GET['lessonID'] . "'");
						if($lessons) echo "<tr><td><div class='teacher_lesson_header'>ALSO TEACHES</div></td></tr>";
						echo "<br/>";
						while($row = mysql_fetch_array($lessons))
						{
							$skill = mysql_fetch_array(mysql_query("SELECT * FROM skills WHERE skillId='" . $row['skillID'] . "'"));
							echo "<a href='teacherprofile.php?teacher_userID=" . $_GET['teacher_userID'] . "&lessonID=" . $row['lessonID'] . "'>" . $skill['skillName'] . "</a><br/>";
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
<div data-role="popup" id="message_popup" class="ui-corner-all" data-position-to="window" data-dismissable="false">
	<form id="message_form" action="processmail.php" method="post">
		<div style="padding:10px 20px;">
			<h3><center>MESSAGE</center></h3>
			<table>
			<tr><td>To:</td><td><label for="receiver"><?php echo $teacher['name'] ?></label></td></tr>
			<input type="hidden" name="receiver" id="receiver" value="<?php echo $_GET['teacher_userID']?>" />
			<tr><td>&nbsp;</td></tr>
			<tr><td>From:&nbsp;&nbsp;</td><td><label for="receiver"><?php echo $user['name'] ?></label></td></tr>
			<input type="hidden" name="sender" id="sender" value="<?php echo $_SESSION['userID']?>" />
	        </table>
			<br/>
			<input type="hidden" name="past_page" id="past_page" value="<?php echo curPageURL() ?>" />
			<input type="text" name="subject" id= "subject" placeholder="Subject..." />
			<textarea cols="60" rows="10" name="message" id="message_textarea" placeholder="Teach me!"></textarea>

	    	<input type="submit" name="send_message" id="send_message" value="Send"></input>
			<a href="#" data-rel="back" data-role="button" data-theme="a">Cancel</a>
		</div>
	</form>
</div>
<script type="text/javascript">
/*$(function(){	
	$("#send_message").click(function() {
		var action = $("#message_form").attr("action");
		var form_data = {
			sender: $("#sender").val(),
			receiver: $("#receiver").val(),
			subject: $("#subject").val(),
			past_page: $("#past_page").val(),
			is_ajax: 1
		};
		$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response) {
					if( response == "success")
					{
						location.reload();
					}
					else
					{
						location.reload();
					}
				}
			});
		$(this).popup('close');
		return false;
	});
}); */
</script>

</footer>
</html>