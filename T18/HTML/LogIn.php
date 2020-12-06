<!DOCTYPE html>

<!-- Filename: Employee Login Page
     Created by Oliver Wilson 
	 
	 v1.0  12/04/2020 OW Initial page created and linked to other pages on the site
	 v1.2  12/05/2020 HZ Formated for best practices and made other changes
-->

<!--          Header         -->
<html lang="en">
<head>
	<title> Log In </title>
	<meta charset="utf-8">
	
	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 60vh;
				background-position: center;
				}
							  
		p { margin: 1px; 
			padding: 7px;
			background-color: rgb(0,0,0,.5);
			border-radius: 100px;
			font-size: 20px;
			font-weight: 600;
			}
				
		form { margin: 1px; 
				padding: 7px;
				background-color: rgb(0,0,0,.5);
				border-radius: 100px;
				font-size: 20px;
				font-weight: 600;
				text-align: center;
				color: white;
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
			  
		table, td { margin-right:auto;       
					margin-left: auto; 
					border:2px solid black;  
					border-collapse:collapse;
					padding: 15px; 
					text-align: left;
					background-color: white;
					}
					
        th { margin-right:auto; 
			 margin-left: auto; 
			 border:2px solid black;  
			 border-collapse:collapse;
			 padding: 15px; 
			 text-align: left;	
			 background-color: orange; 
			 color:white;
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

<!---     Nar Bar     -->

<!-- *********************************************************************
	*	Login Page
	*	Created by Oliver Wilson - 17-Nov-2020.
	********************************************************************* -->
<?php
	//unset($_SESSION['login_status']);
	require "SCnavbar.php"; 
	require ("../connect_db.php");  // Connects to database site_db
?>


<?php
	/**************************************************************************
	*	Input Sanitation
	**************************************************************************/
	// Set variable that were passed from the form
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$username = 			trim($_POST["username"]);
		$password = 			trim($_POST["password"]);
	}
	else {
		$username = $password="";
	}
	

	/**************************************************************************
	*	Initial $error_message to "" - this means there are no errors
	**************************************************************************/
		$error_message="";
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			$error_message = "Enter Username and Password to Login";
		}
		else if ($username=="") {
			$error_message = "Please enter Username.";
		}
		else if ($password=="") {
			$error_message = "Please enter Password.";
		}
		// Error handler to avoid code injections
		else if (strpos($username, "<") !== false) { 
			$error_message = "The '<' character is not allowed. ";
		}
		else {
			$q="SELECT * FROM T18_Users
					WHERE user_name='$username' AND BINARY user_password='$password'";
			$r=mysqli_query($dbc, $q);
			
			if (mysqli_num_rows($r) !== 1) {
				$error_message = "Username and Password are not valid!";
			}
		}
				

	/**************************************************************************
	* Call the function based on value of REQUEST_METHOD
	**************************************************************************/
	if ($_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == "") {
		$q="SELECT * FROM T18_Users
				WHERE user_name='$username' AND BINARY user_password='$password'";
		$r=mysqli_query($dbc, $q);
		
			// If the query ran and we retreived ONE record, get the password in table
			if ($r) {
				// if we have a match - there will be one row retreived
				if (mysqli_num_rows($r) == 1) {
					
					/**************************************************************************
					* 	Successful Login Messages 
					**************************************************************************/
					//session_start();
					$_SESSION['login_status'] = "LOGGED IN";
					
					// Display Login message
					echo "<p style='padding: 20px; margin: 15px; text-align: center; color: white; background-color: rgb(0,0,0,.5)'>";
						echo "Successfully Logged in!<br>";
						echo "<br>Welcome <b> $username </b>!";
					echo "</p>";
					
					//v1.2 Directs user to admin table page after logging in
					header("Location: Admin.php");	
					exit();
				}
			}
	}
	else {
		/**************************************************************************
		 *		When SUBMIT is pressed, browser loads the ACTION file 
		 **************************************************************************/
		echo "<h2> Login to view User table and access admin functions </h2>";
		echo "<form style='background-color: rgb(0,0,0,.5); color: white; action='LogIn.php' method='POST'>";
			echo "<br> Username: 		<input type='text' name='username' value=$username>";
			echo "<br> Password:  		<input type='password' name='password'>"; //v1.2 Changed field type to password 
			echo "<br> <input type='submit'>";
		echo "</form>";
		
		echo "<p style='padding: 20px; margin: 15px; text-align: center; color: white; background-color: rgb(0,0,0,.5)'>";
				// Display error message
			echo "<b>Important:</b> " . $error_message;
		echo "</p>";
	}
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<hr>
<?php
	/**************************************************************************
	* Include footer
	**************************************************************************/
	include "SCfooter.php"; // Include the Sunset Cruises Footer
?>
<br>

</body>
</html>
<!-- END OF FILE -->