<?php

require "database.php";

if (isset($_POST['delete']) && isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$query = "SELECT `id` FROM `users` WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) == 1) {
		$query = "DELETE FROM `users` WHERE `id` = $id";
		$result = mysqli_query($conn, $query);
		
		if ($result) {
			$_SESSION['success'] = "Data has been deleted successfully!";
			header("Location: select-all.php");
		} else {
			$_SESSION['errors'] = ["Can't delete data."];
			header("Location: select-all.php");
		}
	} else {
		header("Location: 404.php");
	}
} else {
	header("Location: 404.php");
}
