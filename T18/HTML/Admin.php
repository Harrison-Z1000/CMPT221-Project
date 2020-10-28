<!DOCTYPE html>

<!-- 
     Admin Options Page
     Created by Team 18. 16-Oct-2020
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
			height: 76vh;
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

<!---     Nar Bar     -->
<?php
	require "SCnavbar.php"; 
?>

<?php
	echo "<h2> Admin Options </h2>";
 
	echo "<table border=1>";
		echo "<tr>";
			echo "<TH> Option </TH>";
			echo "<TH> Description </TH>";
		echo "</tr>";
		  
		echo "<tr>";
			echo "<td> <a href='Sunset Cruises - Team18.pdf'> Design Document </a> </td>";
			echo "<td> Display team project document </td>";
		echo "</tr>";
		  
		echo "<tr>";
			echo "<td> <a href='PHPinfo.php'> PHP Status </a> </td>";
			echo "<td> Display PHP status - phpinfo.php </td>";
		echo "</tr>";

		echo "<tr>";
			echo "<td> <a href='AdminUserTable.php'> Users </a> </td>";
			echo "<td> Show current users </td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td> <a href='AdminCabinTable.php'> Cabins (Products) </a> </td>";
			echo "<td> Show current cabins </td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td> <a href='AdminCruiseTable.php'> Cruises (Suppliers) </a> </td>";
			echo "<td> Show current cruise suppliers </td>";
		echo "</tr>";
	echo "</table>";
?>

<br><br><br><br><br>
<hr>
<?php 
	include "SCfooter.php"; 
?>
<br>

</body>
</html>

<!-- END OF FILE -->
