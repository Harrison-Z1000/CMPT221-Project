<!DOCTYPE html>

<!-- 
    Filename: AdminCabinTable - Displays the contents of the T18_Cabins (products) table 
    v1.0  10/28/2020 HZ Created original program
	v1.2  11/02/2020 HZ Added FILE_AUTHOR and formatted for best practices
	v2.0  11/12/2020 HZ Added sorting feature for key columns and link to AddRowCabin page
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
				height: 100vh;
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

<body style = "background-color: lightgray;">

<?php
	require "SCnavbar.php"; // Includes the Sunset Cruises navigation bar
	require ("../connect_db.php");  // Connects to database site_db

	echo "<table border = 1>";
		echo "<tr>";
	
	/* 
		Query to get columns from the Cabins table
	*/
	$table = "T18_Cabins";
	$q = "EXPLAIN $table";
	$r = mysqli_query($dbc, $q);
	
	// Set $sort_type to passed input from the form 
	if (isset($_POST['sort'])) {
		$sort_type = $_POST['sort'];
	}
	else {
		$sort_type = "cabin_ID";
	}
	
	/* 
		Creates header row of the table with column names
	*/	
	if ($r) {
		while ($row=mysqli_fetch_array($r, MYSQLI_NUM)) {
			echo "<TH>" . $row[0] . "</TH>";
		}
		echo "</tr>";
	}
	else {
		echo "<p>" . mysqli_error($dbc) . "</p>";
	}
								
	/*
		Query to get data from Cabins table 
	*/
	$q = "SELECT * FROM $table 
			ORDER BY $sort_type";
	$r = mysqli_query($dbc, $q);
	
		echo "<tr>";
		
	/*
		Populates table with data from Cabins table
	*/
	if ($r) {
		while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
			for ($x = 0; $x < 9; $x++) {
				if ($x == 9) {
					break;
				}
				echo "<td>" . $row[$x] . "</td>";
			}
			echo "</tr>";
		}
	}	
	echo "</table>";
	
	/**********************************************************************
	*	Button to re-run this same file, sort by may be used
	**********************************************************************/ 
	echo "<form style = 'color: white;' action = 'AdminCabinTable.php' method = 'POST'>";
		echo "<br> <input type = 'submit' value = 'SORT BY:'>";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_ID'>				Cabin ID";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_type'>				Type";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_price'>			Price";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_availability'> 	Availability";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_deck'>				Deck";
		echo "<input type = 'radio' name = 'sort' value = 'cruise_ID'>				Cruise ID";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_active'>			Active";
	echo "</form>";

	// Button that takes you to the page to add a cabin
	echo "<br><form action='AddRowCabin.php'>";
		echo "<button class='button button1' onclick=> Add a New Cabin </button>";
	echo "</form>";	

	echo "<br><br><br><br><br>";
	echo "<hr>";

	include "SCfooter.php"; // Include the Sunset Cruises footer
	
	echo "<br>";
?>

</body>
</html>

<!-- END OF FILE -->
