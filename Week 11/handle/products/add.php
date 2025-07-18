<?php

session_start();

require_once '../../database.php';

const REQUIRED = 'This field is required';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
	$name = trim(htmlspecialchars($_POST['name']));
	$price = trim(htmlspecialchars($_POST['price']));
	
	$errors = [];
	
	if (!isset($_FILES['image'])) {
		$_SESSION['errors']['image'] = REQUIRED;
		header('Location: ../../add_product.php');
		exit();
	}
	
	$image = $_FILES['image'];
	$image_name = $image['name'];
	$image_error = $image['error'];
	$image_size = $image['size'] / (1024 * 1024);
	$image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
	$image_tmp_name = $image['tmp_name'];
	$allowed_extensions = ['png', 'jpg', 'jpeg'];
	
	
	if (empty($name)) {
		$errors['name'] = REQUIRED;
	}
	
	if (empty($price)) {
		$errors['price'] = REQUIRED;
	} elseif (!is_numeric($price) || $price <= 0) {
		$errors['price'] = 'Price must be a positive number';
	}
	
	if ($image_error != 0) {
		$errors['image'] = 'Upload image again';
	} elseif (empty($image_name)) {
		$errors['image'] = REQUIRED;
	} elseif ($image_size > 1) {
		$errors['image'] = 'Image size must be less than 1MB';
	} elseif (!in_array($image_extension, $allowed_extensions)) {
		$errors['image'] = 'Supported extensions: png, jpg, jpeg';
	}
	
	if (empty($errors)) {
		$new_image_name = uniqid() . ".$image_extension";
		$upload_path = "../../uploads/$new_image_name";
		
		$upload_dir = "../../uploads/";
		if (!is_dir($upload_dir)) {
			mkdir($upload_dir, 0755, true);
		}
		
		if (move_uploaded_file($image_tmp_name, $upload_path)) {
			$query = "INSERT INTO `products` (`name`, `price`, `image`) VALUES ('$name', $price, '$new_image_name')";
			$result = mysqli_query($conn, $query);
			
			if ($result) {
				$_SESSION['success'] = 'Product added successfully!';
				header('Location: ../../index.php');
			} else {
				unlink($upload_path);
				$_SESSION['errors'] = ['general' => 'Please try again'];
				header('Location: ../../add_product.php');
			}
		} else {
			$errors['image'] = 'Failed to upload image';
			$_SESSION['errors'] = $errors;
			header('Location: ../../add_product.php');
		}
	} else {
		$_SESSION['name'] = $name;
		$_SESSION['price'] = $price;
		$_SESSION['errors'] = $errors;
		header('Location: ../../add_product.php');
	}
} else {
	$_SESSION['errors'] = ['general' => 'All fields are required'];
	header('Location: ../../add_product.php');
}
