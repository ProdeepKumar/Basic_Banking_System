<?php

    $servername = 'localhost:3306';
    $username = 'root';
    $password = "";
    $database = 'tsfbank';
	// Create connection
    $connection = mysqli_connect($servername, $username,$password,$database);

	if(!$connection){
		die("Unable to connect to the database due to the following error --> ".mysqli_connect_error());
	}
  mysqli_select_db($connection,"tsfbank");
?>
