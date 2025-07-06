<?php

include '../validate.php';

if (isset($_GET['login'])) {
	$username = sanitize($_GET['username']);
	$email = sanitize($_GET['email']);
	
	$errors = [];
	$errors = array_merge($errors, validateUsername($username), validateEmail($email));
	
	if (empty($errors)) {
		echo "Welcome $username, your email is: $email";
	} else {
		printErrors($errors);
	}
} else {
	header("Location: form.php");
}
