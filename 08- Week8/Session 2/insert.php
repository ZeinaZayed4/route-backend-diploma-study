<?php

require_once 'database.php';
require_once 'functions/api_response.php';
require_once 'functions/validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = sanitize($_POST['name']);
	$email = sanitize($_POST['email']);
	$password = sanitize($_POST['password']);
	
	$errors = validateName($name);
	$errors = array_merge($errors, validateEmail($email));
	$errors = array_merge($errors, validatePassword($password));
	
	if (isset($_FILES['image'])) {
		$errors = array_merge($errors, validateImage($_FILES['image']));
	}
	
	if (empty($errors)) {
		$query = "SELECT `id` FROM `users` WHERE `email` = '$email'";
		$result = mysqli_query($conn, $query);
		
		if (mysqli_num_rows($result) > 0) {
			message("Email already exists", 409);
		} else {
			$image_filename = null;
			if (isset($_FILES['image'])) {
				$image_filename = uploadImage($_FILES['image']);
				if (!$image_filename) {
					message("Failed to upload image", 500);
					exit();
				}
			}
			
			$password = password_hash($password, PASSWORD_DEFAULT);
			$query = "INSERT INTO `users` (`name`, `email`, `password`, `image`)
    		  VALUES ('$name', '$email', '$password', '$image_filename')";
			$result = mysqli_query($conn, $query);
			
			if ($result) {
				message("User added successfully", 201);
			} else {
				message("Failed to create user", 500);
			}
		}
	} else {
		message($errors, 400);
	}
} else {
	message('Method not allowed', 405);
}
