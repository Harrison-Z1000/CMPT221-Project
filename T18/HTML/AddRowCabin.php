<!DOCTYPE html>

<!----------------------------------------------------------------------------------
--	Filename: AddRowCabin - Adds new cabins to the Cabins table
--
--  v1.0  11/12/2020 HZ Completed original program and formatted for best practices
<---------------------------------------------------------------------------------->

<!--          Header         -->
<html lang="en">
<head>
	<title> Add Cabin </title>
	<meta charset="utf-8">
	
	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 100vh;
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

<body style = "background-color: lightgray;">

<?php
	require "SCnavbar.php"; // Includes the Sunset Cruises navigation bar
	require ("../connect_db.php");  // Connects to database site_db
	
	/**************************************************************************
	*	Input Validation
	**************************************************************************/
	// Set variables that were passed from the form 
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$type = 				trim($_POST["type"]);
		$price = 				trim($_POST["price"]);
		$availability = 		trim($_POST["availability"]);
		$deck = 				trim($_POST["deck"]);
		$cruise_id =			trim($_POST["cruise_id"]);
		$active =				trim($_POST["active"]);
	}
	else {
		$type = $price = $availability = $description = $deck = $cruise_id = $image = $active = "";
	}
	
	/**************************************************************************
	*	Error Handling
	**************************************************************************/
	// Set initial $error_message to "" - this means there are no errors
	$error_message = "";
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		$error_message = "To add a new cabin, please fill in all the fields above and press SUBMIT";
	}
	else if ($price < 500) {
		$error_message = "Cabins cost a minimum of $500.";
	}
	else if ($price > 10000) {
		$error_message = "Cabins cost a maximum of $10000.";
	}
	else if ($cruise_id < 1) {
		$error_message = "Cruise IDs must be greater than 0.";
	}

	
	/**************************************************************************
	* Call the function based on value of REQUEST_METHOD
	**************************************************************************/
	if ($_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == "") {
		
		echo "<h2> New Cabin was entered Successfully! </h2> <br><br><br><br><br>";
		
		// Button takes you back to the cabins table
		echo "<form action = 'AdminCabinTable.php'>";
			echo "<button class='button button1' onclick=> Back </button>";
		echo "</form><br><br><br><br><br><br><br><br><br><br><br><br>";

		// Insert data into the cabins table
		$q = "INSERT INTO T18_Cabins (cabin_type, cabin_price, cabin_availability, cabin_deck, cruise_ID, cabin_active)" . 
				"VALUES('$type', $price, '$availability', '$deck', $cruise_id, '$active');";
		$r = mysqli_query($dbc, $q);
		
		// Check query return code
		if ($r) {
			echo "<br><br> Data inserted successfully!";
		}
		else {
			echo "<li>" . mysqli_error($dbc) . "</li>";
		}
	}
	else {
		echo "<h2> Add a New Cabin </h2>";  
	}
		
		/**************************************************************************
		* 		When SUBMIT is pressed, browser loads the ACTION code
		**************************************************************************/
		echo "<form style='background-color: rgb(0,0,0,.4); color: white;' action='AddRowCabin.php' method='POST'>";
		echo "<fieldset>";
			echo "<br> Type: 			<select name='type'>";
											echo "<option value='Single'> Single </option>";
											echo "<option value='Double'> Double </option>";
											echo "<option value='Suite'> Suite </option>";
										echo "</select>";
			echo "<br> Price:  			<input type='number' name='price'>";
			echo "<br> Availability: 	<select name='availability'>";
											echo "<option value='Available'> Available </option>";
											echo "<option value='Not Available'> Not Available </option>";
											echo "<option value='On Hold'> On Hold </option>";
										echo "</select>";
			echo "<br> Deck: 			<select name='deck'>";
											echo "<option value='Main'> Main </option>";
											echo "<option value='Lower'> Lower </option>";
											echo "<option value='Upper'> Upper </option>";
										echo "</select>";
			echo "<br> Cruise ID: 		<input type='number' name='cruise_id'>";

			echo "<br> Active?: 		<select name='active'>";
											echo "<option value='Y'> Yes </option>";
											echo "<option value='N'> No </option>";
										echo "</select>";
			echo "<br> <input type='submit'>";
		echo "</fieldset>";
		echo "</form>";
		
		
		echo "<p style='padding: 20px; margin: 15px; text-align: center; color: white;'>";
				// Display error message
			echo "<b>Important:</b> " . $error_message;
		echo "</p>";
		
		
		// Button that takes you to the page to add a cabin
		echo "<form action='AdminCabinTable.php'>";
			echo "<button class='button button1' onclick=> Back </button>";
		echo "</form>";

	echo "<br><br><br><br><br>";
	echo "<hr>";

	include "SCfooter.php"; // Include the Sunset Cruises footer
	
	echo "<br>";
?>

</body>
</html>

<!-- END OF FILE -->
