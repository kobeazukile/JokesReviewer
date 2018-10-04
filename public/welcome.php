<?php
session_start();
include('config.php');

if(!isset($_SESSION['login_user'])) {
	header("location: index.php");
	exit;
}

$login_session = $_SESSION['login_user'];

function pre($x) {
	print '<pre>';
	print_r($x);
	print '</pre>';
}

$sql = "SELECT * FROM Jokes order by RAND() LIMIT 1";
$result = mysqli_query(connection(), $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Your Home Page</title>
</head>
<body>
	<style >
	
	body {background-color: powderblue;}
	h1 {
		text-align: center;
	}
</style>
<form action="" method="POST">
	<input type="submit" value="like" name = "like">
	<input type="submit" value="unlike" name = "unlike">
</form>

<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>