<!DOCTYPE html>

<!-- Group Assigment 02
     Contact Us Page
     Created by Oliver Wilson. 22 September 2020 
	 
	 Log:
	 1) Initial Contact Us Page created. 22-Sep-2020
	 2) Page Linked with Home Page. 23-Sep-2020
-->

<!--         HTML Header         -->
<html lang="en">
<head>
	<title> Contact Us </title>
	<meta charset="utf-8">
	
	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 124vh;
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
			  
		* { box-sizing: border-box; }


		input[type=text], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  margin-top: 6px;
		  margin-bottom: 16px;
		  resize: vertical;
		}

		input[type=submit] {
		  background-color: grey;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  cursor: pointer;
		}

		input[type=submit]:hover { background-color: lightgray;}


		.container {
		  border-radius: 5px;
		  background-color: rgb(0,0,0,.3);
		  padding: 20px;
		}


		.column {
		  float: left;
		  width: 40%;
		  margin-top: 6px;
		  padding: 30px;
		}


		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}

	</style>

</head>

<body style="background-color: lightgray;">
<!--     Body of Webpage     -->

<!---     Nar Bar     -->
<?php
	require "SCnavbar.php";
?>

<div class="container">
  <div style="text-align:center">
    <h2 style="padding-bottom: 1px;">Contact Us</h2>
  </div>
  
  <div class="row">
  
    <div class="column">
      <img src="Map.png" style="border: 5px solid black; width: 100%; height: 300px;"></img>
	  
		<div>
			<h3> _ </h3>
		</div>
		
		<div style="color: white; background-color: rgb(0,0,0,.4); padding: 3px; width: 100%;" class="column">
			<h3 style="padding-top: 0px;"> Come and visit us! </h3>
			<hr>
			<p> Villa Sometown </p>
			<p> PO Box 10575 </p>
			<p> Poughkeepsie, NY 12601 </p>
		</div>
		
    </div>
	
	<!-- Text for contact form -->
    <div style="width: 60%;" class="column">
	
        <label>First Name</label>
        <input type="text" placeholder="Your name..">
		
        <label>Last Name</label>
        <input type="text" placeholder="Your last name..">
		
        <label>Email</label>
		<input type="text" placeholder="Your email..">
        <label style="color: white;"><u>Question</u></label>
		
        <textarea type="text" placeholder="Write something.." style="height:170px"> </textarea>
		
        <input type="submit"> <!-- Form doesn't work. It is just for looks -->
    </div>
  </div>
</div>

<hr>
<?php 
	include "SCfooter.php"; 
?>
<br>

</body>
</html>

<!-- END OF FILE -->
