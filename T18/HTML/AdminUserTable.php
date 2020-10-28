<!DOCTYPE html>

<!--
     User table Page
     Created by Team 18. 27-Oct-2020
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
			height: 78vh;
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
	$table="T18_Users";
	$q="EXPLAIN $table";
	$r=mysqli_query($dbc, $q);

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
	$q="SELECT * FROM $table";
	$r=mysqli_query($dbc, $q);

		echo "<tr>";
	if ($r) {
		while ($row=mysqli_fetch_array($r, MYSQLI_NUM)) {
			for ($x=0; $x < 9; $x++) {
				if ($x==9) {
					break;
				}
				echo "<td>" . $row[$x] . "</td>";
			}
			echo "</tr>";
		}
	}
	echo "</table>";
?>

<br><br><br><br><br><br>
<hr>
<?php
	include "SCfooter.php"; // Include the Sunset Cruises Footer
?>
<br>

</body>
</html>

<!-- END OF FILE -->
