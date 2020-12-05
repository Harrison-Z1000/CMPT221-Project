<!DOCTYPE html>

<!-- 
     File that adds new Cruises to the table
     Created by Oliver Wilson 9-Nov-2020
-->

<!--          Header         -->
<html lang="en">
<head>
	<title> Add Cruise </title>
	<meta charset="utf-8">
	
	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 61vh;
				background-position: center;
				}
		
		.grid-container { display: grid;
						  grid-template-columns: repeat(3, 1fr);
						  grid-gap: 32px;
						  grid-auto-rows: minmax(200px, auto);
						  border-radius: 10px;
						  }
		
		.grid-container > div { background: lightgray;
							  padding: 1em;
							  background-size: cover;
							  background-position: center;
							  height: 100hv;
							  border: 3px solid black;
							  }
							  
		h2 { text-align: center; 
			 font-weight: 600;
			 background-color: rgb(0,0,0,.1)
			 border-radius: 100px;
			 padding: 10px;
			 margin: 10px;
			 } 
		
		img { size: cover;
			  position: center;
			  height: 60px;
			  width: 120px;
			  margin-top: 5px;
			  margin-bottom: -50px;
			  }
		
		p { margin: 1px; 
			padding: 7px;
			background-color: rgb(0,0,0,.4);
			border-radius: 100px;
			font-size: 20px;
			font-weight: 600;
			}
			
		.button {
			  border: none;
			  color: white;
			  padding: 10px 26px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
			  margin: 4px 2px;
			  transition-duration: 0.4s;
			  cursor: pointer;
			}

		.button1 {
			  background-color: white;
			  color: black;
			  border: 2px solid black;
			}

		.button1:hover {
			  background-color: grey;
			  color: white;
			}

	</style>
	
</head>

<body style="background-color: lightgray;">


<?php
	require "SCnavbar.php"; // Includes the Sunset Cruises Navigation Bar
?>

<?php 
	require ("../connect_db.php");  // Connects to database site_db
?>

<?php
	/**************************************************************************
	*	Input Sanitation
	**************************************************************************/
	
	// Set variable that were passed from the form 
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$name = 				trim($_POST["name"]);
		$cabins = 				trim($_POST["cabins"]);
		$capacity = 			trim($_POST["capacity"]);
		$speed = 				trim($_POST["speed"]);
		$active = 				trim($_POST["active"]);
	}
	else {
		$name = $cabins = $description = $capacity = $speed = $active ="";
	}
	
	
	/**************************************************************************
	*	Initial $error_message to "" - this means there are no errors
	**************************************************************************/
		$error_message="";
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			$error_message = "To add a new Cruise, please fill in all the fields above and press SUBMIT";
		}
		else if ($name=="") {
			$error_message = "Make sure to enter the Cruise Name.";
		}
		// Error handler to avoid code injections
		else if (strpos($name, "<") !== false) { 
			$error_message = "The '<' character is not allowed. ";
		}
		else if ($cabins < 4) {
			$error_message = "The Cruise must have 4 cabins as a minimum.";
		}
		else if ($cabins > 50) {
			$error_message = "The Cruise has too many cabins for the business.";
		}
		else if ($capacity < 8) {
			$error_message = "The Cruise must have a minimum capacity of 8 passengers.";
		}
		else if ($capacity >= 100) {
			$error_message = "Sunset Cruises does not provide Cruises that have a passenger capacity of 100 or more.";
		}
		else if ($speed < 2) {
			$error_message = "No Cruise is THAT slow!";
		}
		else if ($speed > 40) {
			$error_message = "Cruise is too fast and unsafe for passengers.";
		}
		/**************************************************************************
		* If the error_message is still "" - Check to see if 'name' already exists
		**************************************************************************/
		else {
			$q="SELECT * FROM T18_Cruise 
					WHERE cruise_name='$name';";
			$r=mysqli_query($dbc, $q);
			
			// If row already exists, prompt user to try again
			if (mysqli_num_rows($r) == 1) {
				$error_message = "Cruise Name already exists. Please enter a new Cruise name.";
			}
		}
		
			
	/**************************************************************************
	* Call the function based on value of REQUEST_METHOD
	**************************************************************************/
	if ($_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == "") {
		
		echo "<h2> New Cruise was entered Successfully! </h2>";
		
		// Button that takes you back to Cruises table
		echo "<form action='AdminCruiseTable.php'>";
			echo "<button class='button button1' onclick=> Back </button>";
		echo "</form><br><br><br><br><br><br><br><br><br><br><br><br>";

		$q="INSERT INTO T18_Cruise (cruise_name, number_of_cabins, cruise_capacity, max_speed_knotts, cruise_active)" . 
				"VALUES('$name', $cabins, $capacity, $speed, '$active');";
		$r=mysqli_query($dbc, $q);
		
		// Check query return code
		if ($r) {
			echo "<br><br> If you see this message Data has been inserted successfully!";
		}
		else {
			echo "<li>" . mysqli_error($dbc) . "</li>";
		}
	}
	else {
		echo "<h2> Add a New Cruise Supplier </h2>";  
		
		/**************************************************************************
		* When SUBMIT is pressed, browser loads the ACTION file
		**************************************************************************/
		echo "<form style='background-color: rgb(0,0,0,.4); color: white;' action='AddRowCruise.php' method='POST'>";
		echo "<fieldset>";
			echo "<br> Name: 						<input type='text' name='name' value=$name>";
			echo "<br> Number of Cabins:  			<input type='number' name='cabins' value=0>";
			echo "<br> Capacity:					<input type='number' name='capacity' value=0>";
			echo "<br> Max Speed: 					<input type='number' name='speed' value=0>";
			echo "<br> Is the Cruise active?: 		<select name='active'>";
														echo "<option value='Y'> Yes </option>";
														echo "<option value='N'> No </option>";
													echo "</select>";
			echo "<br> <input type='submit'>";
		echo "</fieldset>";
		echo "</form>";
		
		echo "<p style='padding: 20px; margin: 15px; text-align: center; color: white; background-color: rgb(0,0,0,.5)'>";
				// Display error message
			echo "<b>Important:</b> " . $error_message;
		echo "</p>";
		
		
		// Button that takes you back to Cruises table
		echo "<form action='AdminCruiseTable.php'>";
			echo "<button class='button button1' onclick=> Back </button>";
		echo "</form>";
	}
?>

<br><br>
<hr>
<?php 
	include "SCfooter.php"; // Includes the Sunset Cruises Footer
?>
<br>

</body>
</html>

<!-- END OF FILE -->