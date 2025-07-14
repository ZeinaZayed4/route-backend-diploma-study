<?php

declare(strict_types=1);

function sanitize($input): string
{
	return trim(htmlspecialchars($input));
}

function validateTitle($title): array
{
	$errors = [];
	if (empty($title)) {
		$errors[] = "Title is required.";
	} elseif (!preg_match('/^[A-Za-z_ ]*$/', $title)) {
		$errors[] = "Title can contain letters and underscores only.";
	}
	return $errors;
}
var_dump(validateTitle($_POST['title']));

function validateBody($body): array
{
	$errors = [];
	if (empty($body)) {
		$errors[] = "Body is required.";
	}
	return $errors;
}

function validateImage($image): array
{
	$errors = [];
	$name = $image['name'];
	$error = $image['error'];
	$size = $image['size'] / (1024 * 1024);
	$extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	$allowed_extensions = ['png', 'jpg', 'jpeg'];

	if ($error != 0) {
		$errors[] = "Image not uploaded.";
	} elseif (!in_array($extension, $allowed_extensions)) {
		$errors[] = "Supported extension: png, jpg, jpeg";
	} elseif ($size > 2) {
		$errors[] = "Image size must be less than 2MB.";
	}
	return $errors;
}

function generateImageName($name): string
{
	$extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	return uniqid() . ".$extension";
}

function uploadImage($image): string
{
	$tmp_name = $image['tmp_name'];
	$new_image_name = generateImageName($image['name']);

	move_uploaded_file($tmp_name, "../uploads/$new_image_name");
	return $new_image_name;
}

function validateName($name): array
{
	$errors = [];
	if (empty($name)) {
		$errors[] = "Name is required.";
	} elseif (!preg_match('/^[A-Za-z ]*$/', $name)) {
		$errors[] = "Name can contain letters only.";
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
	} elseif (in_array($email, getUsers())) {
		$errors[] = "Email already exists.";
	}
	return $errors;
}

function getUsers(): array
{
	global $conn;
	if (!$conn) {
		require_once '../inc/database.php';
	}
	
	$query = "SELECT * FROM `users`";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) > 0) {
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
		$emails = [];
		foreach ($users as $user) {
			$emails[] = $user['email'];
		}
		return $emails;
	}
	return [];
}

function validatePhone($phone): array
{
	$errors = [];
	if (empty($phone)) {
		$errors[] = "Phone is required.";
	} elseif (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
		$errors[] = "Phone number format is invalid.";
	}
	return $errors;
}

function validatePassword($password): array
{
	$errors = [];
	if (empty($password)) {
		$errors[] = "Password is required.";
	} elseif (strlen($password) < 8) {
		$errors[] = "Password must be more than 8 characters.";
	}
	return $errors;
}
