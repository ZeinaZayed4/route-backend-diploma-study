<?php

include '../validate.php';

if (isset($_POST['login'])) {
	$username = sanitize($_POST['username']);
	$email = sanitize($_POST['email']);
	$password = sanitize($_POST['password']);
	$age = sanitize($_POST['age']);
	$gender = sanitize($_POST['gender']);
	
	$errors = [];
	$errors = array_merge(
		$errors,
		validateUsername($username),
		validateEmail($email),
		validatePassword($password),
		validateAge($age),
		validateGender($gender)
	);
	
	if (empty($errors)) {
		echo "Welcome $username, your email is: $email";
	} else {
		printErrors($errors);
	}
} else {
	header("Location: form.php");
}
