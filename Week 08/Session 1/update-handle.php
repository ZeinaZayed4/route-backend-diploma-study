<?php

require "database.php";

if (isset($_POST['update']) && isset($_GET['id'])) {
	$id = $_GET['id'];
	
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
	
	if (!empty($password)) {
		if (strlen($password) < 8 || strlen($password) > 20) {
			$errors[] = "Password is required.";
		}
	}
	
	if (empty($errors)) {
		$query = "SELECT `id` FROM `users` WHERE `id` = $id";
		$result = mysqli_query($conn, $query);
		
		if (mysqli_num_rows($result) == 1) {
			if (!empty($password)) {
				$password = password_hash($password, PASSWORD_DEFAULT);
				$query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `password` = '$password'
						  WHERE `id` = $id";
			} else {
				$query = "UPDATE `users` SET `name` = '$name', `email` = '$email'
				 	  WHERE `id` = $id";
			}
			
			$result = mysqli_query($conn, $query);
			
			if ($result) {
				$_SESSION['success'] = "Data has been updated successfully!";
				header("Location: select-all.php");
			} else {
				$_SESSION['errors'] = ["Can't update data."];
				header("Location: update-form.php?id=$id");
			}
		} else {
			header("Location: 404.php");
		}
	} else {
		$_SESSION['errors'] = $errors;
		header("Location: update-form.php?id=$id");
	}
} else {
	header("Location: update-form.php?id=$id");
}
