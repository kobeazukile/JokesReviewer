<?php
ob_start();

include('functions.php');

if(isset($_SESSION['login_user'])) {
	header("location: welcome.php");
	exit;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start(); 
$error = ''; 

if (isset($_POST['submit'])) {
	login();
}


?> 

<!DOCTYPE html>
<html>
<head>
	<title>Login Form in PHP with Session</title>
</head>
<body>
	<style >
	.center {
		margin: auto;
		width: 50%;
		border: 3px solid green;
		padding: 10px;
	}
	body {
		background-color: powderblue;
	}
	h1 {
		text-align: center;
	}
</style>

<body>

	<div class="center" id="login">
		<h2 >Login for more Do not forget to rate Our jokes</h2>
		<form action="/app/public/" method="post">
			<label>UserName :</label>
			<input id="name" name="username" placeholder="username" type="text">
			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password"><br><br>
			<input name="submit" type="submit" value=" Login ">
			<input type="hidden" name='is-from-form'>
		</form>
	</div>
	<h1>TOP 10 Jokes</h1>
	<?php
		$query = connection()->query('SELECT * FROM data LIMIT 10');
		if($query->num_rows > 0) {
			while($row = $query->fetch_array(MYSQLI_ASSOC)) {
				echo $row['setup'] , '<br>';
			}
		}
	?>
</body>
</html>