<!DOCTYPE html>

<!--
     A10 - Display One Table
     Cruise(Supplier) table Page
     Devin White 11/03/2020
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
				height: 35vh;
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
	require ("connect_db.php");  // Connects to database site_db
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

	if ($r) {
		while ($row=mysqli_fetch_array($r, MYSQLI_NUM)) {
			echo "<th>" . $row[0] . "</th>";
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
?>
<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$cruise_name = trim($_POST["cruise_name"]);
	$number_of_cabins = trim($_POST["number_of_cabins"]);
	$cruise_capacity = trim($_POST["cruise_capacity"]);
	$max_speed_knotts = trim($_POST["max_speed_knotts"]);
	$cruise_active = trim($_POST["cruise_active"]);
}
else {
	$cruise_name = $number_of_cabins = $cruise_capacity = $max_speed_knotts = $cruise_active = "";
}

$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == "GET"){
  $error_message = "Fill in the form and hit SUBMIT";
}
elseif ($cruise_name == "") {
  $error_message = "Please enter the name";
}
elseif (strlen($cruise_name) < 4) {
  $error_message = "The name must be at least 4 characters long";
}


if ($_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == ""){
  echo "<br> Name was entered: $cruise_name";
  echo "<br> Number of cabins is: $number_of_cabins";
  echo "<br> Capacity is: $cruise_capacity";
	echo "<br> The max knots of the ship is: $max_speed_knotts";
	echo "<br> Cabin active: $cruise_active";

//connect to the database and insert the data
require "connect_db.php";
$q = "Insert INTO T18_Cruise(cruise_name, number_of_cabins, cruise_capacity, max_speed_knotts, cruise_active)" .
      "VALUES('$cruise_name',$number_of_cabins, $cruise_capacity, $max_speed_knotts,'$cruise_active')";
$r = mysqli_query ($dbc,$q);
//check quert return code
if ($r) {
  echo "Data inserted!";
}
else {
  echo "<li>" . Mysqli_error($dbc) . "</li>";
  }
}
else {

echo "<br><br><br>";
/******************************************************************************
*    ACTION - This displays an HTML form
******************************************************************************/


  // When submit is pressed, the browser loads the action file
  echo "<form action='A11-white.php' method='POST'>";
  echo "<fieldset>";
  echo "<br> Cruise Name <input type='text' name='cruise_name'>";
  echo "<br> Number of Cabins <input type='text' name='number_of_cabins'>";
  echo "<br> Cruise Capacity <input type='text' name='cruise_capacity'>";
	echo "<br> Cruise Max Speed <input type ='text' name='max_speed_knotts'>";
	echo "<br> Cruise Active <select name ='cruise_active'>";
	echo "<option value='Yes'> Yes </option>";
  echo "<option value='No'> No </option>";
	echo "</select>";

  echo "<br> <input type='submit'>";
  echo "</fieldset>";
  echo "</form>";

  //error Message
  echo "<br> $error_message";
}

 ?>

<br>
<hr>
<?php
	include "footer.php";
?>
<br>

</body>
</html>

<!-- END OF FILE -->
