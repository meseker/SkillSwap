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
<div id="content">
<?php 
	//now the fun part of constructing out all the elements
	$search_value = "";
	$max_rows = 10;
	if( empty($_POST['skill_search']))
	{
		//again, here, I need to scrub the input, but we will lack that out for now 
		//and worry about that later
		$search_value = $_GET["target"];
	}
	else
		{
			$search_value = $_POST["skill_search"];
		}
	echo $search_value;
	
	mysql_connect('mysql-user-master.stanford.edu', 'ccs147meseker', 'ceivohng');
	mysql_select_db('c_cs147_meseker');
	
	/*$query = "SELECT * FROM skills WHERE skillName SOUNDS LIKE ".$search_value; 
	$skill = mysql_query($query);*/
	if( true /*empty($skill)*/ )
	{
		echo "<center><p><h2> No results found</h2> </p></center>";
	}
	else
	{
	$query = "SELECT * FROM LESSONS WHERE ".$skill["skillID"]."LIMIT ".max_rows;
	$lessons = mysql_query($query);*/
	//construct list header
	echo "<ul data-role='listview' class='ui=listview'>";
	//construct list rows
	while($row = mysql_fetch_assoc($lessons))
	{
		$query = "SELECT * FROM USERS WHERE ".$row['userID'];
		$user = mysql_query($query);
		//now create the output! :D
		echo "<li data-theme='c' class='ui-btn ui-btn-icon-right ui-li ui-btn-up-c'>";
		echo "<div class='ui-btn-inner ui-li'>";
		echo "<div class='ut-btn-text'>";
		echo "<a href='#".$row['userID']."'>";
		echo "<p class='ui-li-aside ui-li-desc'><strong>";
		echo "$".$row['cost']." per hour </strong></p>";
		echo "<h3 class='ui-li-heading'>".$user['name']."</h3>";
		echo "<p class='ui-li-desc'>".$row['experience']."</p>";
		echo "<p class='ui-li-desc'>".$row['lesson_description']."</p>";
		echo "</a></div></div></li>";
	}
	}
?>
</div>
</body>
</html>