<!-- Filename: connect_db
	 This file connects to our database using default MIKE@LOCALHOST
	 Important: This file has our password so it must NOT be visible to users!
	
	 V1.0 10/13/2020 HZ Original Program	-->
<?php
  $dbc=mysqli_connect('localhost', 'mike', 'easysteps', 'site_db')
  OR die
	( mysqli_connect_error());;
?>
