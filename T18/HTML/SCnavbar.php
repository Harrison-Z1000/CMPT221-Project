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
					echo "font-weight: 600;";
					echo "padding: 25px;";
					echo "transition: all ease 0.5s;";
				echo "}";
						
		echo ".header ul li a:hover { background-color: lightgray;}";
	echo "</style>";
	
	
	echo "<div class=\"header\">";
		echo "<ul>";
			echo "<li style='float: left;'><img src='Logo.png'></li>";
			echo "<li><a href='HomePage.php'>Home</a></li>";
			echo "<li><a href='HomePage.php'>Our Products</a></li>";
			echo "<li><a href='AboutUs.php'>About Us</a></li>";
			echo "<li><a href='ContactUs.php'>Contact Us</a></li>";
			echo "<li style='float: right;'><a href='Admin.php'> <u>Login</u> </a></li>";
		echo "</ul>";
	echo "</div>";
// END OF FILE
?>

