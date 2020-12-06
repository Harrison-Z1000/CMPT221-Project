<!-- Navigation Bar for the Sunset Cruises website
		Created on 10 October 2020
-->

<?php
	echo "<style>";
		echo ".header { width: 100%;";
				echo "background-color: rgb(0,0,0,.2);";
				echo "}";

		echo ".header ul { text-align: center; }";

		echo ".header ul li { list-style: none;";
				echo "display: inline-block;";
				echo "}";

		echo ".header ul li a { display: block;";
					echo" text-decoration: none;";
					echo "text-transform: uppercase;";
					echo "color: black;";
					echo "font-size: 20px;";
					echo "letter-spacing: 2px;";
					echo "font-weight: 550;";
					echo "padding: 25px;";
					echo "transition: all ease 0.5s;";
				echo "}";

		echo ".header ul li a:hover { background-color: lightgray;}";
	echo "</style>";


	session_start();
	if (isset($_SESSION['login_status'])) {
		$user_status = $_SESSION['login_status'];
	}
	else {
		$user_status = "NOT LOGGED IN.";
	}

	/**************************************************************************
	* 	Display Navigation Bar when ADMIN is logged in
	**************************************************************************/
	if ($user_status == "LOGGED IN") {
		echo "<div class=\"header\">";
			echo "<ul>";
				echo "<li style='float: left;'><img src='Logo.png'></li>";
				echo "<li><a href='HomePage.php'>Home</a></li>";
				echo "<li><a href='HomePage.php'>Our Products</a></li>";
				echo "<li><a href='AboutUs.php'>About Us</a></li>";
				echo "<li><a href='ContactUs.php'>Contact Us</a></li>";
				echo "<li style='float: right;'><a href='Admin.php'> <u>Admin Options</u> </a></li>";
			echo "</ul>";
		echo "</div>";
	}
	/**************************************************************************
	* 	Display Navigation Bar for regular users
	**************************************************************************/
	else {
		echo "<div class=\"header\">";
			echo "<ul>";
				echo "<li style='float: left;'><img src='Logo.png'></li>";
				echo "<li><a href='HomePage.php'>Home</a></li>";
				echo "<li><a href='HomePage.php'>Our Products</a></li>";
				echo "<li><a href='AboutUs.php'>About Us</a></li>";
				echo "<li><a href='ContactUs.php'>Contact Us</a></li>";
				echo "<li style='float: right;'><a href='LogIn.php'> <u>Login</u> </a></li>";
			echo "</ul>";
		echo "</div>";
	}
?>
