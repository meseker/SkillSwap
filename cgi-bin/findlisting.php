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
<div id="content">
	<form action="search.php" method="search">
		<div data-role="fieldcontain">
			<label for="search">Search for specific activity</label>
			<input type="search" name="skill_search" id="skill_search" value="" />
			<br/>
			<center>
			<button type="submit" data-theme="b">Search</button>
			</center>
		</div>
	</form>
	
	<ul data-role="listview">
		<li><a>Sports</a>
			<ul>
				<li><a href="search.php?target='basketball'">Basketball</a></li>
				<li><a href="search.php?target='tennis'">Tennis</a></li>
				<li><a href="search.php?target='swimming'">Swimming</a></li>
				<li><a href="search.php?target='raquetball'">Raquetball</a></li>
				<li><a href="search.php?target='basketball'">Football</a></li>
			</ul>
		</li>
			
		<li><a>Music</a>
			<ul>
				<li><a href="search.php?target='basketball'">Basketball</a></li>
				<li><a href="search.php?target='tennis'">Tennis</a></li>
				<li><a href="search.php?target='swimming'">Swimming</a></li>
				<li><a href="search.php?target='raquetball'">Raquetball</a></li>
				<li><a href="search.php?target='basketball'">Football</a></li>
			</ul>
		</li>
		
		<li><a>Art</a>
			<ul>
				<li><a href="search.php?target='pencil%20drawing'">Pencil Drawing</a></li>
				<li><a href="search.php?target='sculpture'"> Sculpture</a></li>
				<li><a href="search.php?target='painting'">Painting</a></li>
				<li><a href="search.php?target='graphic%20art'">Graphic Art</a></li>
				<li><a href="search.php?target='jewerly'">Jewerly</a></li>
			</ul>
		</li>
		<li><a>Academics</a>
			<ul>
				<li><a href="search.php?target='basketball'">Physics</a></li>
				<li><a href="search.php?target='tennis'">Chemistry</a></li>
				<li><a href="search.php?target='swimming'">Calculus</a></li>
				<li><a href="search.php?target='biology'">Biology</a></li>
				<li><a href="search.php?target='english'">English</a></li>
			</ul>
		</li>
		
		<li><a>Crafts</a>
			<ul>
				<li><a href="search.php?target='weaving'">Weaving</a></li>
				<li><a href="search.php?target='quilt%20knitting'">Quilt Knitting</a></li>
				<li><a href="search.php?target='crochet'">Crocheting</a></li>
				<li><a href="search.php?target='bracelets'">Bracelets</a></li>
				<li><a href="search.php?target='model%20cars'">Model Cars</a></li>
			</ul>
		</li>
		
		<li><a>Miscellaneous</a>
			<ul>
				<li><a href="search.php?target='juggling'">Juggling</a></li>
				<li><a href="search.php?target='balancing'">Balancing</a></li>
				<li><a href="search.php?target='magic'">Magic</a></li>
				<li><a href="search.php?target='changing%20oil'">Changing Oil</a></li>
				<li><a href="search.php?target='archery'">Archery</a></li>
			</ul>
		</li>
	</ul>
</div>
</body>
</html>