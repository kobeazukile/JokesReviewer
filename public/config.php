
<?php

function connection() {
	// $servername = '192.168.95.100:4042'; 
	// $username = 'root';
	// $password = 'root';
	// $database = 'local';

	$servername = 'localhost'; 
	$username = 'root';
	$password = '';
	$database = 'jokes';

	$conn = new mysqli($servername, $username, $password, $database);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

?>