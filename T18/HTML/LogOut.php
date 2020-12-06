<!DOCTYPE html>

<!-- Filename: Logout Page
	 
	 v1.0  12/04/2020 OW Initial page created and linked to other pages on the site
	 v1.2  12/05/2020 HZ Formated for best practices
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

<?php
	require "SCnavbar.php"; // Includes the Sunset Cruises Navigation Bar
	require ("../connect_db.php"); // Connect to site_db and set $dbc to use with mysql functions
	
	unset($_SESSION["login_status"]);;
	
	// Display Login message
	echo "<p style='padding: 20px; margin: 15px; text-align: center; color: white; background-color: rgb(0,0,0,.5)'>";
		echo "Log Out Successful <br>";
	echo "</p>";
	
	// Button that takes user to the Home Page
	echo "<form action='HomePage.php'>";
		echo "<button class='button button1' onclick=> Back to Home Page </button>";
	echo "</form>";	

	echo "<br><br><br><br>";

?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<hr>
<?php
	// Include the code to display the Sunset Cruises footer, which uses FILE_AUTHOR
	include "SCfooter.php";
?>
<br>

</body>
</html>
<!-- END OF FILE -->