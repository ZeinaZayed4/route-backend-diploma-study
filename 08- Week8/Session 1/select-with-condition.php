<?php

require_once 'database.php';

$country = "USA";
$query = "SELECT * FROM `customers` WHERE country = '$country'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	while ($customer = mysqli_fetch_assoc($result)) {
		echo "<h3>Customer number: {$customer['customerNumber']}</h3>";
		echo "<p>Name: {$customer['customerName']}</p>";
		echo "<p>Phone: {$customer['phone']}</p>";
		echo "<p>Country: {$customer['country']}</p>";
		echo '<hr />';
	}
} else {
	header("Location: 404.php");
}
