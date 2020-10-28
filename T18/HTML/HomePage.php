<!DOCTYPE html>

<!-- Group Assigment 02
     Home Page Draft
     Created by Oliver Wilson 16 September 2020 
	 
	 Log:
	 1) Initial Page created 16-Sep-2020
	 2) Linked Home Page to the rest of the pages. 23-Sep-2020
-->

<!--         HTML Header         -->
<html lang="en">
<head>
	<title>Home Page </title>
	<meta charset="utf-8">
	
	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 130vh;
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
			background-color: rgb(0,0,0,.1);
			border-radius: 100px;
			font-size: 20px;
			font-weight: 600;
			}
							  
		h2 { text-align: center; 
			 font-weight: 600;
			 background-color: rgb(0,0,0,.1)
			 border-radius: 100px;
			 padding: 20px;
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

<?php require ("../connect_db.php"); ?>

<!---     Nar Bar     -->
<?php
	require "SCnavbar.php";
?>
<h2> Plan your perfect sailing experience! Do not miss the chance to wander through remote travel destinations to celebrate life in the most wonderful places in the world.<br><br>
Sunset Cruises features the most complete selection of onboard modern and comfortable private yachts. </h2>
<hr>
<h3 style="text-align: center; font-weight: 600; font-size: 25px;"> The Sunset Cruises Fleet </h3>

<!-- Grid with Boats -->
<div class="grid-container">
	<div style="background-image: url(Catamaran.jpg);"><p><a href="Catamaran.php"> Catamaran </a></p></div>
	<div style="background-image: url(Sunseeker.jpg);"><p><a href="Sunseeker88.php"> Sunseeker 88 </a> </p></div>
	<div style="background-image: url(Trimaran.jpg);"><p><a href="Trimaran.php"> Trimaran </a></p></div>
	<div style="background-image: url(Unbridled.jpg);"><p><a href="Unbridled.php"> Unbridled </a></p></div>
	<div style="background-image: url(Amarula.jpg);"><p style="background-color: rgb(0,0,0,.2);"><a href="Amarula.php"> Amarula Sun </a></p></div>
	<div style="background-image: url(SeaVoyager.jpg);"><p><a href="SeaVoyager.php"> Sea Voyager 223 </a></p></div>
</div>
<br> <br>

<hr>
<!-- Disclaimer -->
	
<?php
      include "SCfooter.php";
?>
	
<br>
</body>
</html>
	
<!-- END OF FILE -->
