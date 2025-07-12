<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$email = trim(htmlspecialchars($_POST['email']));
	$password = trim(htmlspecialchars($_POST['password']));
	
	$errors = [];
	if (empty($email)) {
		$errors[] = "Email is required";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Invalid email format";
	}
	
	if (empty($password)) {
		$errors[] = "Password is required";
	} elseif (strlen($password) < 8) {
		$errors[] = "Password must be more than 8 characters";
	}
	
	if (empty($errors)) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		setcookie('email', $email, time() + 60 * 60);
		setcookie('password', $password, time() + 60 * 60);
		header("Location: testCookies.php");
	} else {
		var_dump($errors);
	}
} else {
	header("Location: cookies.php");
}
