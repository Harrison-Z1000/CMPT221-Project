<!DOCTYPE html>

<!-- Group Assigment 02
     Change Log Page
     Created by Team 18. 16 September 2020 
	 
-->

<!--         HTML Header         -->
<html lang="en">
<head>
	<title> Change Log </title>
	<meta charset="utf-8">
	
	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 71vh;
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

	</style>

</head>

<body style="background-color: lightgray;">
<!--     Body of Webpage     -->

<!---     Nar Bar     -->
<?php
	require "SCnavbar.php";
?>

<h2> Change Log </h2>
	<p style="padding: 20px; margin: 15px; text-align: center; color: white;"> 
		<br> V1 Initial Page created. 16-Sep-2020 <br>
		<br> V1.2 Linked Home Page to the rest of the pages. 23-Sep-2020 <br>
		<br> V1.3 Footer and Navigation Bar are linked using PHP. 15-Oct-2020 <br>
		<br> V2.0 Admin fuctions added with connection to SQL database. 27-Oct-2020 </br>
	</p>
<br><br><br><br><br><br><br><br><br><br>
<hr>
<?php 
	include "SCfooter.php"; 
?>
<br>

</body>
</html>

<!-- END OF FILE -->
