<?php

require_once 'database.php';
require_once 'functions/validation.php';
require_once 'functions/api_response.php';
require_once 'functions/uri.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = checkUri();
	
	if (!empty($id)) {
		$name = sanitize($_POST['name']);
		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);
		$image = $_FILES['image'];
		
		$errors = validateName($name);
		$errors = array_merge($errors, validateEmail($email));
		$errors = array_merge($errors, validatePassword($password));
		
		
		if (isset($image)) {
			$errors = array_merge($errors, validateImage($_FILES['image']));
		}
		
		if (empty($errors)) {
			$query = "SELECT * FROM `users` WHERE `id` = $id";
			$result = mysqli_query($conn, $query);
			
			if (mysqli_num_rows($result) === 1) {
				$user = mysqli_fetch_assoc($result);
				$query = "SELECT `id` FROM `users` WHERE `email` = '$email' AND `id` != $id";
				$result = mysqli_query($conn, $query);
				
				if (mysqli_num_rows($result) > 0) {
					message("Email already exists", 409);
				} else {
					$image_filename = $user['image'];
					
					if (isset($image)) {
						$new_image = uploadImage($image);
						if ($new_image) {
							if ($user['image'] && file_exists("uploads/{$user['image']}")) {
								unlink("uploads/{$user['image']}");
							}
							$image_filename = $new_image;
						} else {
							message("Failed to upload image", 500);
							exit();
						}
					}
					$password = password_hash($password, PASSWORD_DEFAULT);
					$query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `password` = '$password', `image` = '$image_filename'
					  WHERE `id` = $id";
					$result = mysqli_query($conn, $query);
					if ($result) {
						message("User updated successfully", 200);
					} else {
						message("Failed to update user", 500);
					}
				}
			} else {
				message("User not found", 404);
			}
		} else {
			message($errors, 400);
		}
	} else {
		message("User id is required", 400);
	}
} else {
	message("Method not allowed", 405);
}
