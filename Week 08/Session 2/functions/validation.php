<?php

function sanitize($input): string
{
	return trim(htmlspecialchars($input));
}

function validateName($name): array
{
	$errors = [];
	if (empty($name)) {
		$errors[] = "Name is required.";
	} elseif (strlen($name) < 3 || strlen($name) > 20) {
		$errors[] = "Name must be between 3 and 20 characters.";
	}
	return $errors;
}

function validateEmail($email): array
{
	$errors = [];
	if (empty($email)) {
		$errors[] = "Email is required.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Invalid email format.";
	}
	return $errors;
}

function validatePassword($password): array
{
	$errors = [];
	if (empty($password)) {
		$errors[] = "Password is required.";
	} elseif (strlen($password) < 9) {
		$errors[] = "Password must be more than 8 characters.";
	}
	return $errors;
}

function validateImage($image_file): array
{
    $errors = [];
    
    if (!isset($image_file)) {
        $errors[] = "No image uploaded";
        return $errors;
    }
	$image_name = $image_file['name'];
	$image_size = $image_file['size'] / (1024 * 1024);
	$extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
	$image_error = $image_file['error'];
	$extension_types = ['png', 'jpg', 'jpeg'];
	
	if ($image_error != 0) {
		$errors[] = "Error uploading image.";
	} elseif (!in_array($extension, $extension_types)) {
		$errors[] = "Image extension isn't supported.<br />Supported extensions: ('png', 'jpg', 'jpeg').";
	} elseif ($image_size > 2) {
		$errors[] = "Image size must be less than 2MB.";
	}
    
    return $errors;
}

function generateImageName($name): string
{
	$extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    return uniqid() . ".$extension";
}

function uploadImage($image_file): string {
	$tmp_name = $image_file['tmp_name'];
    $image_name = $image_file['name'];
	$new_image_name = generateImageName($image_name);
    
    move_uploaded_file($tmp_name, "uploads/$new_image_name");
    return $new_image_name;
}
