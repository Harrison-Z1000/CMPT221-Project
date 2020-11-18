<!--
     File that adds new Cruises to the table
     Created by Oliver Wilson 9-Nov-2020
-->

<!--          Header         -->
<html lang="en">
<head>
	<title> Delete Row </title>
	<meta charset="utf-8">

	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 60vh;
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
	require ("connect_db.php");  // Connects to database site_db
?>

<?php
	$display_message = "";

	if (isset($_GET["user_ID"])) {
		$id= $_GET["user_ID"];
	}
	else {
		$display_message = "No Id Specified!";
	}


	$q ="UPDATE T18_Users
			SET user_active='N'
			WHERE user_ID=$id";
	$r=mysqli_query ($dbc,$q);


			// Check query return code
		if ($r ) {
			echo "<p style='padding: 20px; margin: 15px; text-align: center; color: white;'>";
				echo "User has been Deactivated!";
			echo "</p>";
		}
		else {
		   echo "<li>" . mysqli_error( $dbc ) . "</li>";
		}


	// Button that takes you back to Cruises table
	echo "<form action='AdminUserTable.php'>";
		echo "<button class='button button1' onclick=> <-- Back to User Table </button>";
	echo "</form>";
?>

<br><br>
<hr>
<?php
	include "SCfooter.php"; // Includes the Sunset Cruises Footer
?>
<br>

</body>
</html>
