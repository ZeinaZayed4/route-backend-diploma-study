<?php

require_once 'database.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM `customers` WHERE `customerNumber` = '$id'";
	
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) == 1) {
		$customer = mysqli_fetch_assoc($result);
		
		echo "<h3>Customer number: {$customer['customerNumber']}</h3>";
		echo "<p>Name: {$customer['customerName']}</p>";
		echo "<p>Phone: {$customer['phone']}</p>";
	} else {
		header("Location: 404.php");
	}
} else {
	header("Location: 404.php");
}
