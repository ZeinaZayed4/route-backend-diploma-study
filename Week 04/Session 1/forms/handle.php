<?php

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['submit']) && isset($_FILES['image'])) {
	$name = trim(htmlspecialchars($_POST['name']));
	$image = $_FILES['image'];
	
	$image_name = $image['name'];
	$image_errors = $image['error'];
	$image_size = $image['size'] / (1024 * 1024);
	$image_tmp_name = $image['tmp_name'];
	$image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
	$allowed_extensions = ['png', 'jpg', 'jpeg'];
	$new_image_name = uniqid() . ".$image_extension";
	
	$errors = [];
	if ($image_errors != 0) {
		$errors[] = "Image is not correct.";
	} elseif (!in_array($image_extension, $allowed_extensions)) {
		$errors[] = "Supported extensions: png, jpg, jpeg";
	} elseif ($image_size > 1) {
		$errors[] = "Image size must be less than 1MB.";
	}
	
	if (empty($errors)) {
		move_uploaded_file($image_tmp_name, "uploads/$new_image_name");
		echo "Image uploaded successfully!";
	} else {
		var_dump($errors);
	}
} else {
	header("Location: form.php");
}
