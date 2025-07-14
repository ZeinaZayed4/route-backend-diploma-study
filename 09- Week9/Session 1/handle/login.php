<?php

session_start();
require_once '../inc/database.php';
require_once 'validate.php';

if (isset($_POST['submit'])) {
	$email = sanitize($_POST['email']);
	$password = sanitize($_POST['password']);
	
	$errors = [];
	
	if (empty($email)) {
		$errors[] = "Email is required.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Invalid email format.";
	}
	
	if (empty($password)) {
		$errors[] = "Password is required.";
	}
	
	if (empty($errors)) {
		$query = "SELECT * FROM `users` WHERE `email` = '$email'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			$user = mysqli_fetch_assoc($result);
			$old_password = $user['password'];
			$user_verified = password_verify($password, $old_password);
			
			if ($user_verified) {
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['success'] = "Welcome {$user['name']}";
				header("Location: ../index.php");
			} else {
				$_SESSION['email'] = $email;
				$_SESSION['errors'] = ["Invalid email or password."];
				header("Location: ../login.php");
			}
		} else {
			$_SESSION['email'] = $email;
			$_SESSION['errors'] = ["Invalid email or password."];
			header("Location: ../login.php");
		}
	} else {
		$_SESSION['email'] = $email;
		$_SESSION['errors'] = $errors;
		header("Location: ../login.php");
	}
} else {
	header("Location: ../login.php");
}
