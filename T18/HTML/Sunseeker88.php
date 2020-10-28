<!DOCTYPE html>

<!-- Group Assigment 02
     Our Products - Sunseeker88 Page
     Created by Devin White. 23 September 2020 
	 
	 Log:
	 1) Initial page created and linked to other pages on the site. 23-Sep-2020
-->


    <html lang="en">
    <head>
      <title>Sunseeker 88 Tour</title>
      <meta charset="utf-8">
      <style>
      body { background: url(Crab.jpg) no-repeat;
          background-size: cover;
          height: 126vh;
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
      <php?
      include "SCnavbar.php";
      ?>
<hr></hr>
      <header> <h1> Sunseeker 88 Cruise </h1> </header>
<hr></hr>

<table border = 1>
  <tr>
    <td><img src="Sunseeker.jpg" style= "width:625px; height:370px; margin-top:0px; margin-bottom:0px;"> </td>
    <td style="background-color: rgb(0,0,0,.4); color: white">
		<h2>Enjoy a day on the Sunseeker Crusie! You can rent the Sunseeker for a day
			on the Great South Bay (with proper license). Enjoy everything the
			Great South Bay has to offer by trying:
			<br></br>- Water Tubing<br></br>- Water Skiing<br></br>- Lovely Sunset for the whole family<br></br>- And much more!</h2></td>
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

<!--     END OF FILE      -->
