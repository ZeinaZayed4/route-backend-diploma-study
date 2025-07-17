<?php

require_once "database.php";

if (isset($_POST['submit'])) {
	$name = trim(htmlspecialchars($_POST['name']));
	$email = trim(htmlspecialchars($_POST['email']));
	$password = trim(htmlspecialchars($_POST['password']));
	
	$errors = [];
	if (empty($name)) {
		$errors[] = "Name is required.";
	} elseif (strlen($name) < 3 || strlen($name) > 20) {
		$errors[] = "Name must be between 3 and 20 characters";
	}
	
	if (empty($email)) {
		$errors[] = "Email is required.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Email format is invalid.";
	}
	
	if (empty($password)) {
		$errors[] = "Password is required.";
	} elseif (strlen($password) < 8 || strlen($password) > 20) {
		$errors[] = "Password must be between 8 and 20 characters.";
	}
	
	if (empty($errors)) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		$query = "INSERT INTO `users` (`name`, `email`, `password`)
				  VALUES ('$name', '$email', '$password')";
		$result = mysqli_query($conn, $query);
		
		if ($result) {
			$_SESSION['success'] = "Data has been added successfully!";
			header("Location: select-all.php");
		} else {
			$_SESSION['errors'] = ["Can't add data."];
			header("Location: insert-form.php");
		}
		
	} else {
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['errors'] = $errors;
		header("Location: insert-form.php");
	}
} else {
	header("Location: insert-form.php");
}
