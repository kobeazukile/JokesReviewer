<?php
include 'config.php';

/*
| ---------------------------
| Contains reusable functions.
| ----------------------------
*/

function pre($x) {
	print '<pre>';
	print_r($x);
	print '</pre>';
}

function getTopTenJokes()
{
	return connection()->query('SELECT * FROM data LIMIT 10');
}

function saveJoke($id, $setup, $punchline)
{
	connection()->query("INSERT INTO data(apiId, setup, punchline) VALUES ('$id', '$setup', '$punchline')");
}

function jokeExists($id)
{
	$query = connection()->query('SELECT * FROM data WHERE apiId = $id');
	if ($query->num_rows > 0) {
		return true;
	}

	return false;
}

function login() {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}else{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT username, password  FROM users  where username=? AND password=? LIMIT 1";
		$connection = connection();

		if ($stmt = $connection->prepare($query)) {
			$stmt->bind_param("ss", $username, $password);
			$stmt->execute();
			$stmt->bind_result($username, $password);
			$stmt->store_result();

			if($stmt->fetch()) {
				$_SESSION['login_user'] = $username;
				header("location: profile.php");
				exit;
			}else{
				$error = "Username or Password is invalid";
			}
		}else{
			throw new Exception($connection->error);
		}

		mysqli_close(connection());
		return false;
	}
}