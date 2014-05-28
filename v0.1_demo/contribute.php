<?php

	//Create database connection
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "starch_demo";
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


	//Test if database connection occured
	if(mysqli_connect_errno()) { 
		die("Database connection failed:" . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}

	$submit = @$_POST['submit'];
	//Declare variables to prevent errors
	$student_first_name = "";
	$student_last_name = "";
	$student_email = "";
	$instructor_1 = "";
	$instructor_2 = "";
	$instructor_3 = "";
	$instructor_4 = "";
	$instructor_5 = "";
	$instructor_6 = "";
	$instructor_7 = "";


	//Pull variables from POST
	$student_first_name = strip_tags(@$_POST['student_first_name']);
	$student_last_name = strip_tags(@$_POST['student_last_name']);
	$student_email = strip_tags(@$_POST['student_email']);
	$instructor_1 = strip_tags(@$_POST['instructor_1']);
	$instructor_2 = strip_tags(@$_POST['instructor_2']);
	$instructor_3 = strip_tags(@$_POST['instructor_3']);
	$instructor_4 = strip_tags(@$_POST['instructor_4']);
	$instructor_5 = strip_tags(@$_POST['instructor_5']);
	$instructor_6 = strip_tags(@$_POST['instructor_6']);
	$instructor_7 = strip_tags(@$_POST['instructor_7']);


	//Query all instructors
	$query = "SELECT * FROM profile ";
	$query .= "ORDER BY last_name ";
	$query .= "LIMIT 37";
	$all_instructors = mysqli_query($connection, $query);

	//Main sequence
	if ($submit) {

		//query all profiles
		$newquery = "SELECT * FROM profile";
		$result = mysqli_query($connection, $newquery);
		$all_profiles = mysqli_fetch_all($result);

		
		
		$full_name = $student_first_name . " " . $student_last_name;
		echo "Added information for " . $full_name . ". Thank you!" . "<br>";

		//check if profile exists
		foreach ($all_profiles as $profile) {
			$first_name_match = false;
			$last_name_match = false;
			$name_match = false;

			if ($student_first_name == $profile[1]) {
				if ($student_last_name == $profile[2]) {
					echo "This profile already exists.";
					$name_match = true;
					break;
				}
			}
		}

		if (!$name_match) {
				//ADD USER TO PROFILE TABLE
				$add_student = "INSERT INTO profile VALUES ('','$student_first_name','$student_last_name', '')";
				$query = mysqli_query($connection, $add_student);

				//GET STUDENT ID NUMBER
				$query = "SELECT id FROM profile WHERE id = (SELECT MAX(id) FROM profile)";
				$result = mysqli_query($connection, $query);
				$newest_student = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$student_id = $newest_student[0]['id'];
				//echo $student_id;
		}
		
		if ($name_match) {
				//DONT ADD USER TO PROFILE TABLE
				
				//GET STUDENT ID NUMBER
				$query = "SELECT id FROM profile WHERE first_name = '$student_first_name' AND last_name ='$student_last_name' LIMIT 1";
				$result = mysqli_query($connection, $query);
				$newest_student = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$student_id = $newest_student[0]['id'];
				//echo $student_id;
		}
		

		//echo $instructor_1;
		if ($instructor_1 != "--Instructor--") {
			//ADD LINKS TO LINKS TABLE
			$add_links = "INSERT INTO links VALUES ('', '$student_id', '$instructor_1 - 1')";
			$query = mysqli_query($connection, $add_links);
		}

		//echo $instructor_2;
		if ($instructor_2 != "--Instructor--") {
			//ADD LINKS TO LINKS TABLE
			$add_links = "INSERT INTO links VALUES ('', '$student_id', '$instructor_2 - 1')";
			$query = mysqli_query($connection, $add_links);
		}

		//echo $instructor_3;
		if ($instructor_3 != "--Instructor--") {
			//ADD LINKS TO LINKS TABLE
			$add_links = "INSERT INTO links VALUES ('', '$student_id', '$instructor_3 - 1')";
			$query = mysqli_query($connection, $add_links);
		}

		//echo $instructor_4;
		if ($instructor_4 != "--Instructor--") {
			//ADD LINKS TO LINKS TABLE
			$add_links = "INSERT INTO links VALUES ('', '$student_id', '$instructor_4 - 1')";
			$query = mysqli_query($connection, $add_links);
		}

		//echo $instructor_5;
		if ($instructor_5 != "--Instructor--") {
			//ADD LINKS TO LINKS TABLE
			$add_links = "INSERT INTO links VALUES ('', '$student_id', '$instructor_5 - 1')";
			$query = mysqli_query($connection, $add_links);
		}

		//echo $instructor_6;
		if ($instructor_6 != "--Instructor--") {
			//ADD LINKS TO LINKS TABLE
			$add_links = "INSERT INTO links VALUES ('', '$student_id', '$instructor_6 - 1')";
			$query = mysqli_query($connection, $add_links);
		}

		//echo $instructor_7;
		if ($instructor_7 != "--Instructor--") {
			//ADD LINKS TO LINKS TABLE
			$add_links = "INSERT INTO links VALUES ('', '$student_id', '$instructor_7 - 1')";
			$query = mysqli_query($connection, $add_links);
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Starch</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel='stylesheet' type='text/css' href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
	</head>
	<body>
		<div class="container">
			<header class="header">
				<h2>Help this project grow by connecting yourself to the instructors who came before you:</h2>
									
				<form class="cbp-mc-form" action="contribute.php" method="POST">
					<div class="cbp-mc-column">
					<p>You only get one chance to submit this, so make sure everything is spelled correctly. If your name is already in the database, you can add more instructors by entering your name exactly as you see it in the list and completing the form.
					<label for="first_name">First Name</label>
					<input type="text" name="student_first_name" size="25" placeholder="Jonathan">
					<label for="last_name">Last Name</label>
					<input type="text" name="student_last_name" size="25" placeholder="Doe">
					<label for="email">Email Address</label>
					<input type="text" name="student_email" size="25" placeholder="jon@doe.com">Enter only if you want to receive updates about this project.<br><br>
					</div>
				
					<div class="cbp-mc-column">
					<p>Please select the instructors that you've had for <b>studio</b> during your architectural education. Anyone who has taken architectural studios is encouraged to submit.
					<br><!-- INSTRUCTOR -->
					<?php
					//Query all instructors
					$query = "SELECT * FROM profile ";
					$query .= "ORDER BY last_name ";
					//$query .= "LIMIT 35";
					$all_instructors = mysqli_query($connection, $query);
					?>
					<select id="instructor_1" name="instructor_1">
					<option>--Instructor--</option>
					<?php			
						//Populate with instructors
						while($row = mysqli_fetch_assoc($all_instructors)) {
							echo "<option value='" . $row["id"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
						}
					?>
					</select><br>

					<!-- INSTRUCTOR -->
					<?php
					//Query all instructors
					$query = "SELECT * FROM profile ";
					$query .= "ORDER BY last_name ";
					//$query .= "LIMIT 35";
					$all_instructors = mysqli_query($connection, $query);
					?>
					<select id="instructor_2" name="instructor_2">
					<option>--Instructor--</option>
					<?php			
						//Populate with instructors
						while($row = mysqli_fetch_assoc($all_instructors)) {
							echo "<option value='" . $row["id"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
						}
					?>
					</select><br>

					<!-- INSTRUCTOR -->
					<?php
					//Query all instructors
					$query = "SELECT * FROM profile ";
					$query .= "ORDER BY last_name ";
					//$query .= "LIMIT 37";
					$all_instructors = mysqli_query($connection, $query);
					?>
					<select id="instructor_3" name="instructor_3">
					<option>--Instructor--</option>
					<?php			
						//Populate with instructors
						while($row = mysqli_fetch_assoc($all_instructors)) {
							echo "<option value='" . $row["id"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
						}
					?>
					</select><br>

					<!-- INSTRUCTOR -->
					<?php
					//Query all instructors
					$query = "SELECT * FROM profile ";
					$query .= "ORDER BY last_name ";
					//$query .= "LIMIT 37";
					$all_instructors = mysqli_query($connection, $query);
					?>
					<select id="instructor_4" name="instructor_4">
					<option>--Instructor--</option>
					<?php			
						//Populate with instructors
						while($row = mysqli_fetch_assoc($all_instructors)) {
							echo "<option value='" . $row["id"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
						}
					?>
					</select><br>

					<!-- INSTRUCTOR -->
					<?php
					//Query all instructors
					$query = "SELECT * FROM profile ";
					$query .= "ORDER BY last_name ";
					//$query .= "LIMIT 37";
					$all_instructors = mysqli_query($connection, $query);
					?>
					<select id="instructor_5" name="instructor_5">
					<option>--Instructor--</option>
					<?php			
						//Populate with instructors
						while($row = mysqli_fetch_assoc($all_instructors)) {
							echo "<option value='" . $row["id"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
						}
					?>
					</select><br>

					<!-- INSTRUCTOR -->
					<?php
					//Query all instructors
					$query = "SELECT * FROM profile ";
					$query .= "ORDER BY last_name ";
					//$query .= "LIMIT 37";
					$all_instructors = mysqli_query($connection, $query);
					?>
					<select id="instructor_6" name="instructor_6">
					<option>--Instructor--</option>
					<?php			
						//Populate with instructors
						while($row = mysqli_fetch_assoc($all_instructors)) {
							echo "<option value='" . $row["id"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
						}
					?>
					</select><br>

					<!-- INSTRUCTOR -->
					<?php
					//Query all instructors
					$query = "SELECT * FROM profile ";
					$query .= "ORDER BY last_name ";
					//$query .= "LIMIT 37";
					$all_instructors = mysqli_query($connection, $query);
					?>
					<select id="instructor_7" name="instructor_7">
					<option>--Instructor--</option>
					<?php			
						//Populate with instructors
						while($row = mysqli_fetch_assoc($all_instructors)) {
							echo "<option value='" . $row["id"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
						}
					?>
					</select><br>

					<input type="submit" name="submit" value="Submit my data!">
					</div>
				</form>
			</header>
		</div><!-- /container -->
	</body>
	<script src="js/classie.js"></script>
</html>



