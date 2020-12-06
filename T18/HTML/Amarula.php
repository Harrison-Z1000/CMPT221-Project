<!DOCTYPEhtml>

<!-- Group Assigment 02
     Our Products - Amarula Page
     Created by Devin White. 23 September 2020 
	 
	 Log:
	 1) Initial page created and linked to other pages on the site. 23-Sep-2020
-->


<html lang="en">
<head>
  <title>Amarula Cruise</title>
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

<?php
	require "SCnavbar.php"; // Includes the Sunset Cruises Navigation Bar
?>

<hr></hr>
      <header> <h1> Amarula Sun Experience</h1> </header>
<hr></hr>

<table border = 1>
  <tr>
    <td><img src="Amarula.jpg" style= "width:625px; height:370px; margin-top:0px; margin-bottom:0px;"> </td>
    <td style="background-color: rgb(0,0,0,.4); color: white">
		<h2>The Amarula Sun Cruise is an exciting tour around the island of Jamaica.
			There are endless activities to do upon reaching shore. Check out the:
			<br></br>- Bob Marley Museum<br></br>- Usain Bolt's Training Facility<br></br>- Rose Hall Great House<br></br>- And Much More!</h2></td>
  </tr>
</table>

<h2 style="color: white;">Check our availability:</h2>

<table style="background-color: white;">
  <tr style="backgroud-color: white;">
    <td><h3>Availability will be added soon!</h3></td>
  <tr>
</table>

<br></br>
<br></br>
<hr></hr>
<?php 
	// Include the code to display the Sunset Cruises footer, which uses FILE_AUTHOR
	include "SCfooter.php"; 
?>      

</Body>
</html>
