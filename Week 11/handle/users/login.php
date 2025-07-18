<?php

session_start();
require_once '../../database.php';

const REQUIRED = 'This field is required';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
	$username = trim(htmlspecialchars($_POST['username']));
	$password = trim(htmlspecialchars($_POST['password']));
	
	$errors = [];
	if (empty($username)) {
		$errors['username'] = REQUIRED;
	}
	
	if (empty($password)) {
		$errors['password'] = REQUIRED;
	}
	
	if (!empty($errors)) {
		$_SESSION['errors'] = $errors;
		header('Location: ../../login.php');
		exit();
	}
	
	$query = "SELECT * FROM `users` WHERE `username` = '$username'";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		$is_verified = password_verify($password, $user['password']);
		
		if ($is_verified) {
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['role'] = $user['role'];
			$_SESSION['success'] = "Welcome $username!";
			header('Location: ../../index.php');
		} else {
			$_SESSION['errors'] = ['general' => 'Invalid username or password!'];
			header('Location: ../../login.php');
		}
	} else {
		$_SESSION['username'] = $username;
		$_SESSION['errors'] = ['general' => 'Invalid username or password!'];
		header('Location: ../../login.php');
	}
} else {
	header('Location: ../../login.php');
}
