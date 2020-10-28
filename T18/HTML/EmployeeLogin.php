<!DOCTYPE html>

<!-- Group Assigment 02
     Employee Login Page
     Created by Harrison Zheng. 23 September 2020 
	 
	 Log:
	 1) Initial page created and linked to other pages on the site. 23-Sep-2020
-->

<!--         HTML Header         -->
<html lang="en">
<head>
	<title>Employee Login Form</title>
	<meta charset="utf-8">
	<meta content="initial-scale=1.0, width=device-width" name="viewport" />
	<meta name="description" content="Employee Login Form">

	<!-- CSS -->
	<style>
		body { background: url(Crab.jpg) no-repeat;
				background-size: cover;
				height: 60vh;
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

		img { size: cover;
			  position: center;
			  height: 60px;
			  width: 120px;
			  margin-top: 5px;
			  margin-bottom: -50px;
			  }
	</style>
</head>

<body>

<!---     Nar Bar     -->
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

<!---     Credential Fields     -->
<div>
	<div id="main">
	<div class="content">
		<div style="background-color: rgb(0,0,0,.4); color: white;" class="row column one">		
			<br><br><br><br><br><br><br>
			<form>
				<div class="form-element-wrapper" style="text-align: center;">
					<label>Username</label>
					<input type="text">
				</div>
				
				<div class="form-element-wrapper" style="text-align: center;">
					<label>Password </label>
					<input type="password">
				</div>
				
				<br>
				<div class="form-element-wrapper" style="text-align: center;">
					<button type="submit"> Submit </button> <!-- Button does not work. It is only for looks -->
				</div>
				<p style="text-align: center;"> Change password </p>
				<br>
			</form>
		</div> <!-- end of row -->
	</div>
	</div>
</div>

<br><br><br><br><br><br><br>

<hr>
<!-- Disclaimer -->
<php?
      include "SCfooter.php";
?>
</body>
</html>