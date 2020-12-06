<!DOCTYPE html>

<!-- 
    Filename: AdminCabinTable - Displays the contents of the T18_Cabins (products) table 
    v1.0  10/28/2020 HZ Created original program
	v1.2  11/02/2020 HZ Formatted for best practices
	v2.0  11/12/2020 HZ Added sorting feature for key columns and link to AddRowCabin page
	v3.0  11/18/2020 HZ Added link to deactivate cabins
	v3.2  12/04/2020 OW Changed table headers to user language
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
	
	require ("../connect_db.php"); // Connect to site_db and set $dbc to use with mysql functions

	echo "<table border = 1>";
		echo "<tr>";
	
	/**********************************************************************
	*	ACTION CODE - Displays a Table
	**********************************************************************/
	
	// Set $sort_type to passed input from the form
	if (isset($_POST['sort'])) {
		$sort_type = $_POST['sort'];
	}
	else {
		$sort_type = "cabin_ID";
	}
	
	// Set $where_clause to passed input from thr form
	if (isset($_POST['where_clause'])) {
		$where_clause = $_POST['where_clause'];
	}
	else {
		$where_clause = "SELECT * FROM T18_Cabins";
	}
		
	// Create and begin table
	echo "<table border=1>";
		echo "<tr>"; // v3.2 Changed table headers to user language
			echo "<th> ID </th>";
			echo "<th> Cabin Type </th>";
			echo "<th> Price </th>";
			echo "<th> Availability </th>";
			echo "<th> Location on Deck</th>";
			echo "<th> Cruise ID </th>";
			echo "<th> Active? </th>";
		echo "</tr>";
	
								
	/**********************************************************************
	*	Query to get data from Cabins table
	**********************************************************************/		
	$q = "$where_clause
				ORDER BY $sort_type";
	$r = mysqli_query($dbc, $q);
	
	if ($r) {
		while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
			echo "<tr>";
				echo "<td>" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td> $" . $row[2] . "</td>";
				echo "<td>" . $row[3] . "</td>";
				echo "<td>" . $row[5] . "</td>";
				echo "<td>" . $row[6] . "</td>";
				echo "<td> <a href='DeleteCabinRow.php?cabin_ID=" . $row[0] . "'> DEACTIVATE </a> </td>";
			echo "</tr>";
		}
	}
	echo "</table>"; // Finish and close the table
	
	/**********************************************************************
	*Button to re-run this same file based on the new 'sort by' selection
	**********************************************************************/		
	echo "<form style = 'color: white;' action = 'AdminCabinTable.php' method = 'POST'>";
		echo "<br> <input type = 'submit' value = 'SORT BY:'>";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_ID'>				ID";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_type'>				Cabin Type";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_price'>			Price";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_availability'> 	Availability";
		echo "<input type = 'radio' name = 'sort' value = 'cabin_deck'>				Deck Location";
		echo "<input type = 'radio' name = 'sort' value = 'cruise_ID'>				Cruise ID";
	echo "</form>";
	
	
	/***************************************************************************
	*Button to re-run this same file based on the new 'where_clause' selection
	****************************************************************************/
	echo "<br><form style='color: white;' action='AdminCabinTable.php' method='POST'>";
		echo "<input type='submit' value='SHOW USERS:'>";
		echo "<input type='radio' name='where_clause' value='SELECT * FROM T18_Cabins
															WHERE cabin_active=\"Y\"'>		Active";
		echo "<input type='radio' name='where_clause' value='SELECT * FROM T18_Cabins
															WHERE cabin_active=\"N\"'>		Inactive";
		echo "<input type='radio' name='where_clause' value='SELECT * FROM T18_Cabins'> 	Both";	
	echo "</form>";
		

	/**********************************************************************
	*	Button that takes you to the page to add a cabin
	**********************************************************************/		
	echo "<br><form action='AddRowCabin.php'>";
		echo "<button class='button button1' onclick=> Add a New Cabin </button>";
	echo "</form>";	

	echo "<br><br><br>";
	echo "<hr>";

	// Include the code to display the Sunset Cruises footer, which uses FILE_AUTHOR
	include "SCfooter.php";
	
	echo "<br>";
?>

</body>
</html>

<!-- END OF FILE -->