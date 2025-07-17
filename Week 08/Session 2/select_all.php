<?php

require_once 'database.php';
require_once 'functions/api_response.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$query = "SELECT * FROM `users`";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) > 0) {
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
		$users = json_encode($users);
		echo $users;
	} else {
		message("No data found", 404);
	}
} else {
	message("Method not allowed", 405);
}

