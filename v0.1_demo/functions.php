<?php

/*DATABASE
These functions handle the database connections
-----------------------------------------------------------------------
db_connect
confirm_query
db_release_data
db_close_connection
*/
	function db_connect () {
	//Create database connection
		define("DB_SERVER", "localhost");
		define("DB_USER", "root");
		define("DB_PASS", "");
		define("DB_NAME", "starch_demo");
		
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		
		//Test if database connection occured
		if(mysqli_connect_errno()) { 
			die("Database connection failed:" . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
		}
	}

	function confirm_query($result_set) {
	//confirm database query was successful
		if (!$result_set) {
			die("Database query failed!");
		}
	}

	function db_release_data($result) {
		//Release returned data
		global $connection;
		mysqli_free_result($result);
	}

	function db_close_connection() {
	//Close database connection
		global $connection;
		mysqli_close($connection);
	}




/*GET
These functions retrieve data from the database
-----------------------------------------------------------------------
*/
	function get_all_links () {
		//get all the links
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM links";
		$result = mysqli_query($connection, $query);
		$links = mysqli_fetch_all($result,MYSQLI_ASSOC);

		//return a 2d array of links with the student as the first entry and the instructor as the second
		return $links;
	}

	function get_all_instructors () {
		//get all the instructors
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM profile";
		$result = mysqli_query($connection, $query);
		$instructors = mysqli_fetch_all($result,MYSQLI_ASSOC);

		//return a 2d array of instructors
		return $instructors;

	}


/*BUILD WHOLE DIAGRAM
This function builds the data tree for the force layout for the entire dataset.
-----------------------------------------------------------------------
data = {
"nodes":[
{"id":"Rachel Brown",       "index":0},
{"id":"Matt Shea",          "index":1},
{"id":"Scott Lawrence",     "index":2}
],

"links":[
{"source":7,"target":0},
{"source":7,"target":1},
{"source":7,"target":2}
],

"scale":1
};

*/

function build_whole_diagram () {
	//get all instructors
	$instructors = get_all_instructors();

	//get all links
	$links = get_all_links();



	//build nodes
	$data = '{"nodes":[';

	foreach ($instructors as $instructors) {
		$data .= '{"id":';
		$data .= '"' . $instructors['first_name'] . ' ' . $instructors['last_name'] . '", ';
		$data .= '"index":';
		$data .= $instructors['id'];
		$data .= '},';
	}
	$data .= '], ';
	
	//build links
	$data .= '"links":[';
	foreach ($links as $links) {
		$data .= '{"source":';
		$data .= $links['student_id'] - 1;
		$data .= ', ';
		$data .= '"target":';
		$data .= $links['instructor_id'] - 1;
		$data .= '},';
	}
	
	$data .= '], "scale":1 };';
	return $data;
}

?>