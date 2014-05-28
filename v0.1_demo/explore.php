<?php include("functions.php"); ?>
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "starch_demo");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<META HTTP-EQUIV="refresh" CONTENT="120"> 
		<title>Explore</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel='stylesheet' type='text/css' href="css/colony.css" />
        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	</head>
	<body>

		<div id="colony">
			
		</div>

		<div id="readme">
		    <div id="readme-contents">
		        <h1>starch - a project by Patrick Beseda</h1>
		        <p>Starch is a visualisation tool for exploring architectural educational lineage.

		        <p>The studio model so prevalent in the architectural academy during the last century is defined by the relationship between an instructor and a student. It represents a passing of knowledge of theory, technique, and content. Instructors develop methods, investigations, and inqueries. Students map out possibilities, explore potentials and iterate tirelessly.
				<p>As time progresses and student becomes teacher, the knowledge that was passed on evolves and develops into a new set of studio scenarios.
				<p>This project explores the lineage of instruction and allows users to input their own experience and add to the historical network.
		        <p>Each individual in the network is represented as a node in the graph. If one individual has been taught by another,
		        a link is made between the two individuals.
		        <p><br>Special thanks to Matthew Shea for his advice and critique, for allowing scope creep and for guiding me in this project and beyond.

		        
		    </div>
		</div>
		
		<div id="footer">
			<p>Directions: When hovering over a node, the instructors of that individual are highlighted in a light color, the students of that individual are highlighted in a dark color. Click on an individual node to isolate their network of students and instructors.</p>
			<A HREF="javascript:history.go(0)">Refresh network!</A>
		</div>	
		<script type="text/javascript">
		var data = <?php echo build_whole_diagram(); ?>
		</script>

 		<script type="text/javascript" src="./js/colony1.js"></script>
	</body>
	<script src="js/classie.js"></script>
</html>