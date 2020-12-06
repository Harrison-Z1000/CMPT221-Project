<!DOCTYPEhtml>

<!-- Group Assigment 02
     Our Products - Trimaran Page
     Created by Devin White. 23 September 2020 
	 
	 Log:
	 1) Initial page created and linked to other pages on the site. 23-Sep-2020
-->

	
<html lang="en">
<head>
  <title>Trimaran Cruise</title>
  <meta charset="utf-8">
  <style>
      body { background: url(Crab.jpg) no-repeat;
          background-size: cover;
          height: 125vh;
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
      img { size: cover;
          position: center;
  			  height: 60px;
      	  width: 120px;
  			  margin-top: 5px;
  			  margin-bottom: -50px;
    		  }
</style>
</head>
<!--  Body of webpage -->
<body>

<!---     Nar Bar     -->
<?php
	require "SCnavbar.php";
?>
<hr></hr>
      <header> <h1> Trimaran Experience </h1> </header>
<hr></hr>

<table border = 1>
  <tr>
    <td><img src="Trimaran.jpg" style= "width:625px; height:370px; margin-top:0px; margin-bottom:0px;"> </td>
    <td style="background-color: rgb(0,0,0,.4); color: white">
		<h2>The Trimaran Cruise is an extravagant tour around the islands of Florida Keys.
			The Florida Keys have plenty to offer. Be sure to check out the:
			<br></br>- Crystal Clear Ocean Water<br></br>- Silky White Sands<br></br>- Ocean-Front Dining<br></br>- And Much More!</h2></td>
	</tr>
</table>

<h2 style="color: white;">Check our availabiliy:</h2>

<table style="background-color: white;">
  <tr style="backgroud-color: white;">
    <td><h3>Availability will be added soon!</h3></td>
  <tr>
</table>

<br></br>
<br></br>
<hr></hr>
<?php 
	include "SCfooter.php"; 
?>

</Body>
</html>
