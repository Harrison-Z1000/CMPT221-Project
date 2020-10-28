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

      .header { width: 100%;
             background-color: rgb(0,0,0,.2);
             }

      .header ul { text-align: center; }

      .header ul li { list-style: none;
              display: inline-block;
              }

      .header ul li a { display: block;
                text-decoration: none;
                text-transform: uppercase;
                color: black;
                font-size: 20px;
                letter-spacing: 2px;
                font-weight: 600;
                padding: 25px;
                transition: all ease 0.5s;
              }

      .header ul li a:hover { background-color: lightgray;}

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
        <div class="header">

        	<ul>
        		<li style="float: left;"><img src="Logo.png"></li>
        		<li><a href="HomePage.html">Home</a></li> 
				<li><a href="HomePage.html">Our Products</a></li>
        		<li><a href="AboutUs.html">About Us</a></li>
        		<li><a href="ContactUs.html">Contact Us</a></li>
        		<li style="float: right;"><a href="EmployeeLogin.html"> <u>Login</u> </a></li>

        	</ul>
        </div>
<hr></hr>
      <header> <h1> Amarula Sun Experience</h1> </header>
<hr></hr>

<table border = 1>
  <tr>
    <td><img src="Amarula.jpg" style= "width:625px; height:370px; margin-top:0px; margin-bottom:0px;"> </td>
    <td style="background-color: rgb(0,0,0,.4); color: white">
		<h2>The Amarula Sun Crusie is an exciting tour around the island of Jamaica.
			There are endless activities to do upon reaching the shores. Check out The:
			<br></br>- Bob Marley Museum<br></br>- Usain Bolt's training facility<br></br>- Rose Hall Great House<br></br>- And much more!</h2></td>
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

<!-- END OF FILE -->
