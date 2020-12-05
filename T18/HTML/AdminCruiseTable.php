<!DOCTYPE html>

<!-- 
     Cruise(Supplier) table Page 
     Created by Oliver Wilson 27-Oct-2020
-->

<!--          Header         -->
<html lang="en">
<head>
	<title> Cruise Table </title>
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
	/**********************************************************************
	*	ACTION CODE - Displays a Table
	**********************************************************************/ 

	// Set $sort_type to passed input from the form 
	if (isset($_POST['sort'])) {
		$sort_type=$_POST['sort'];
	}
	else {
		$sort_type="cruise_ID";
	}
	
	// Set $where_clause to passed input from the form
	if (isset($_POST['where_clause'])) {
		$where_clause = $_POST['where_clause'];
	}
	else {
		$where_clause = "SELECT * FROM T18_Cruise";
	}
	
	// Create and begin table
	echo "<table border=1>";
		
		echo "<tr>";
			echo "<th> ID </th>";
			echo "<th> Name </th>";
			echo "<th> Number of Cabins </th>";
			echo "<th> Description </th>";
			echo "<th> Capacity </th>";
			echo "<th> Max Speed </th>";
			echo "<th> Active? </th>";
		echo "</tr>";
				
				
	/**********************************************************************
	*	Query to get Data from User Table
	**********************************************************************/ 
	$q="$where_clause
			ORDER BY $sort_type";
	$r=mysqli_query($dbc, $q);
	
	if ($r) {
		while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
			echo "<tr>";
				echo "<td>" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td>" . $row[2] . "</td>";
				echo "<td>" . $row[3] . "</td>";
				echo "<td>" . $row[4] . "</td>";
				echo "<td>" . $row[5] . "</td>";
				echo "<td> <a href='DeleteCruiseRow.php?cruise_ID=" . $row[0] . "'> DEACTIVATE </a> </td>";
			echo "</tr>";
		}
	}
	echo "</table>"; // Finish and close the table
	
	
	/*************************************************************************
	*	Button to re-run this same file based on the new 'sort by' selection
	*************************************************************************/ 
	echo "<form style='color: white;' action='AdminCruiseTable.php' method='POST'>";
		echo "<br> <input type='submit' value='SORT:'>";
		echo "<input type='radio' name='sort' value='cruise_ID'>			ID";
		echo "<input type='radio' name='sort' value='cruise_name'>			Name";
		echo "<input type='radio' name='sort' value='number_of_cabins'>		Cabins";
		echo "<input type='radio' name='sort' value='cruise_capacity'>		Capacity";
		echo "<input type='radio' name='sort' value='max_speed_knotts'>		Speed";
	echo "</form>";
	
	
	/***************************************************************************
	*	Button to re-run this same file based on the 'where_clause' selection
	****************************************************************************/
	echo "<br><form style='color: white;' action='AdminCruiseTable.php' method='POST'>";
		echo "<input type='submit' value='SHOW USERS:'>";
		echo "<input type='radio' name='where_clause' value='SELECT * FROM T18_Cruise
																WHERE cruise_active=\"Y\"'>		Active";
		echo "<input type='radio' name='where_clause' value='SELECT * FROM T18_Cruise
																WHERE cruise_active=\"N\"'>		Inactive";
		echo "<input type='radio' name='where_clause' value='SELECT * FROM T18_Cruise'> 			Both";														
	echo "</form>";												
	
	
	/*************************************************************************
	*	Button that takes you to the 'add cruise' page
	*************************************************************************/
	echo "<br><form action='AddRowCruise.php'>";
		echo "<button class='button button1' onclick=> Add a New Cruise </button>";
	echo "</form>";
?>

<br><br><br>
<hr>
<?php 
	include "SCfooter.php"; // Include the Sunset Cruises Footer
?>
<br>

</body>
</html>

<!-- END OF FILE -->