<?php

session_start();

//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
//exit();

require_once '../../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
	$product_id = $_POST['product_id'];
	$user_id = $_SESSION['user_id'];
	
	$query = "INSERT INTO `orders` (`user_id`, `product_id`) VALUES ($user_id, $product_id)";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$_SESSION['success'] = 'Product added to cart!';
		header('Location: ../../index.php');
	} else {
		$_SESSION['errors']['cart'] = "Can't add product to cart.";
		header('Location: ../../index.php');
	}
} else {
	header('Location: ../../index.php');
}
