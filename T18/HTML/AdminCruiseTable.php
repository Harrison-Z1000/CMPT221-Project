<!DOCTYPE html>

<!-- 
     Cruise(Supplier) table Page 
     Created by Oliver Wilson 27-Oct-2020
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

<body style="background-color: lightgray;">


<?php
	require "SCnavbar.php"; // Includes the Sunset Cruises Navigation Bar
?>

<?php 
	require ("../connect_db.php");  // Connects to database site_db
?>

<?php
	echo "<table border=1>";
		echo "<tr>";
	
	/* 
		Query to get Columns from the Users Table
	*/
	$table="T18_Cruise";
	$q="EXPLAIN $table";
	$r=mysqli_query($dbc, $q);
	
	// Set $sort_type to passed input from the form 
	if (isset($_POST['sort'])) {
		$sort_type=$_POST['sort'];
	}
	else {
		$sort_type="cruise_ID";
	}
	
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
		Query to get Data from Users Table 
	*/
	$q="SELECT * FROM $table
			ORDER BY $sort_type";
	$r=mysqli_query($dbc, $q);
	
		echo "<tr>";
	if ($r) {
		while ($row=mysqli_fetch_array($r, MYSQLI_NUM)) {
			for ($x=0; $x < 7; $x++) {
				if ($x==7) {
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

	echo "<form style='color: white;' action='AdminCruiseTable.php' method='POST'>";
		echo "<br> <input type='submit' value='SORT BY:'>";
		echo "<input type='radio' name='sort' value='cruise_Id'>			ID";
		echo "<input type='radio' name='sort' value='cruise_name'>			Name";
		echo "<input type='radio' name='sort' value='number_of_cabins'>		Cabins";
		echo "<input type='radio' name='sort' value='cruise_capacity'>		Capacity";
		echo "<input type='radio' name='sort' value='max_speed_knotts'>		Speed";
		echo "<input type='radio' name='sort' value='cruise_active'>		Active?";
	echo "</form>";

	
	// Button that takes you to the add cruise page
	echo "<br><form action='AddRowCruise.php'>";
		echo "<button class='button button1' onclick=> Add a New Cruise </button>";
	echo "</form>";
?>

<br>
<hr>
<?php 
	include "SCfooter.php"; // Include the Sunset Cruises Footer
?>
<br>

</body>
</html>