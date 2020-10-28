<!DOCTYPE html>

<!-- Group Assigment 02
     About Us Page
     Created by Oliver Wilson 16 September 2020 
	 
	 Log:
	 1) Initial Page created 23-Sep-2020
-->

<!--         HTML Header         -->
<html lang="en">
<head>
	<title> About Us </title>
	<meta charset="utf-8">
	
	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 109vh;
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

<h2> About Us </h2>
	<p style="padding: 20px; margin: 15px; text-align: center;"> 
		Sunset Cruises provides cruise trips to destinations on anyone's bucket list, including Bermuda, Nova Scotia, Martha’s Vineyard, and many more! <br><br>
		Customers stay in our ships’ pristine cabins for trips lasting from 3 to 8 nights. <br><br>
		They can choose between singles, doubles, and larger suites. Unlike other cruise lines, we provide quality getaways at a fraction of the cost. 
	</p>
	
<h2 style="background-color: rgb(0,0,0,.3); color:white;"> We are still working on our product! <br> 
	 But wait! Once Sunset Cruises launches its site, you will be able to: 
</h2> 
		<p style="text-align: center; background-color: rgb(0,0,0,.4); color: white;"> Check itineraries <br>
			Check prices <br>
			Check cabin availabilities <br>
			Book cabins <br>
			See and give reviews <br>
			Log in to employee and admin accounts <br>
			Modify cabin availability<br>
			Add and remove employees from the database<br>
			... and do much more! </p>
	

<hr>
<?php 
	include "SCfooter.php"; 
?>
<br>

</body>
</html>

<!-- END OF FILE -->
