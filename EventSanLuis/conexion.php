<?php
	$servername = "sql205.0fees.us";
	$username = "0fe_19125340";
	$password = "parcial3";
	$dbname = "0fe_19125340_event_slp";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>