<!DOCTYPE html>

<!--
     File that adds new Cruises to the table
     Created by Team 18, 9-Nov-2020
     Edited by Team 18, 17-Nov-2020
-->

<!--          Header         -->
<html lang="en">
<head>
	<title> Admin Functions </title>
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

		$username = 				trim($_POST["username"]);
		$password = 				trim($_POST["password"]);
		$email = 			      trim($_POST["email"]);
		$active = 		  		trim($_POST["active"]);
		$type = 		    		trim($_POST["type"]);
		$date =             trim($_POST["date"]);
	}
	else {
		$username = $password = $email = $active = $type =  "";
	}


	/**************************************************************************
	*	Initial $error_message to "" - this means there are no errors
	**************************************************************************/
		$error_message="";
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			$error_message = "To add a new User, please fill in all the fields above and press SUBMIT";
		}
		else if ($username == "") {
			$error_message = "Make sure to enter the User Name.";
		}
		else if (strlen($password)<6) {
			$error_message = "The password must be 6 or more characters.";
		}
		else if ($email == "") {
			$error_message = "Make sure to enter Email.";
		}
		else if ($active == "") {
			$error_message = "Make sure to specify activity.";
		}
		else if ($type == "") {
			$error_message = "Make sure to specify type.";
		}




	/**************************************************************************
	* Call the function based on value of REQUEST_METHOD
	**************************************************************************/
	if ($_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == "") {

		echo "<h2> Data was entered Successfully! </h2>";

		// Button that takes you back to user table
		echo "<form action='AdminUserTable.php'>";
			echo "<button class='button button1' onclick=> Back </button>";
		echo "</form><br><br><br><br><br><br><br><br><br><br><br><br>";

		date_default_timezone_set('America/New_York');
		$q="INSERT INTO T18_Users (user_name , user_password, user_email, user_active, employee_type, creation_date)" .
				"VALUES('$username', '$password', '$email', '$active', '$type','".date('Y-m-d h-i-s')."');";
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
		echo "<h2> Add a New User </h2>";

		// -------------------------  ACTION code  ------------------------------

		// When SUBMIT is pressed, browser loads the ACTION file
		echo "<form style='background-color: rgb(0,0,0,.4); color: white;' action='AddRowUser.php' method='POST'>";
		echo "<fieldset>";
			echo "<br> User Name: 						<input type='text' name='username' value=$username>";
			echo "<br> Password:  			<input type='password' name='password'>";
			echo "<br> Email:					<input type='email' name='email' value='$email'>";
			echo "</select>";
			echo "<br> Employee type: 		<select name='type'>";
			echo "<option value='admin'> Admin </option>";
			echo "<option value='employee'> Employee </option>";
			echo "</select>";
			echo "<br> Date:  <input type='date' name='date'>";
			echo "<br> Is the User active?: 		<select name='active'>";
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


		// Button that takes you back to Cruises table
		echo "<form action='AdminUserTable.php'>";
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
