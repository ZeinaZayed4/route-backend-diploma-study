<?php

session_start();
require_once '../../database.php';

const REQUIRED = 'This field is required';
const LENGTH = 'This field must be more than 8 characters';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
	$username = trim(htmlspecialchars($_POST['username']));
	$password = trim(htmlspecialchars($_POST['password']));
	
	$errors = [];
	if (empty($username)) {
		$errors['username'] = REQUIRED;
	} elseif (strlen($username) < 8) {
		$errors['username'] = LENGTH;
	}
	
	if (empty($password)) {
		$errors['password'] = REQUIRED;
	} elseif (strlen($password) < 8) {
		$errors['password'] = LENGTH;
	}
	
	if (empty($errors)) {
		$hash_password = password_hash($password, PASSWORD_DEFAULT);
		
		$query = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hash_password')";
		$result = mysqli_query($conn, $query);
		
		if ($result) {
			$_SESSION['success'] = 'User registered successfully!';
			header('Location: ../../login.php');
		} else {
			$_SESSION['errors'] = ['general' => 'Please try again!'];
			header('Location: ../../register.php');
		}
	} else {
		$_SESSION['username'] = $username;
		$_SESSION['errors'] = $errors;
		header('Location: ../../register.php');
	}
	
} else {
	header("Location: ../../register.php");
}
