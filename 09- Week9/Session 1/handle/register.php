<?php

session_start();
require_once '../inc/database.php';
require_once 'validate.php';

if (isset($_POST['submit'])) {
	$name = sanitize($_POST['name']);
	$email = sanitize($_POST['email']);
	$phone = sanitize($_POST['phone']);
	$password = sanitize($_POST['password']);
	
	$errors = [];
	$errors = array_merge(
		$errors, validateName($name),
		validateEmail($email), validatePhone($phone),
		validatePassword($password)
	);
	
	if (empty($errors)) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO `users` (`name`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$hashed_password')";
		$result = mysqli_query($conn, $query);
		
		if ($result) {
			$_SESSION['success'] = "User registered successfully.";
			header("Location: ../login.php");
		} else {
			$_SESSION['errors'] = ["Error registering user."];
			header("Location: ../register.php");
		}
	} else {
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
		$_SESSION['errors'] = $errors;
		header("Location: ../register.php");
	}
} else {
	header("Location: ../register.php");
}
