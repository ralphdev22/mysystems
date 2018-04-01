<?php

	$servername = "localhost";
	$username = "root";
	$password = "Framgia@123";
	$dbname = "test";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// echo "Connected successfully";
?>