<?php

declare(strict_types=1);

function sanitize($input): string
{
	return trim(htmlspecialchars($input));
}

function validateUsername($username): array
{
	$errors = [];
	if (empty($username)) {
		$errors[] = "Username is required.";
	} elseif (strlen($username) < 8 || strlen($username) > 20) {
		$errors[] = "Username must be between 8 and 20 characters.";
	}
	return $errors;
}

function validateEmail($email): array
{
	$errors = [];
	if (empty($email)) {
		$errors[] = "Email is required.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Email format is invalid.";
	}
	return $errors;
}

function validatePassword($password): array
{
	$errors = [];
	if (empty($password)) {
		$errors[] = "Password is required.";
	} elseif (strlen($password) < 8 || strlen($password) > 25) {
		$errors[] = "Password must be between 8 and 25 characters.";
	}
	return $errors;
}

function validateAge($age): array
{
	$errors = [];
	if (empty($age)) {
		$errors[] = "Age is required.";
	} elseif (!is_numeric($age)) {
		$errors[] = "Age must be a number.";
	} elseif ($age < 18 || $age > 60) {
		$errors[] = "Age must be between 18 and 60.";
	}
	return $errors;
}

function validateGender($gender): array
{
	$errors = [];
	if (empty($gender)) {
		$errors[] = "Gender is required.";
	} elseif (!in_array($gender, ['male', 'female'])) {
		$errors[] = "Gender must be a male or female.";
	}
	return $errors;
}

function printErrors($errors): void
{
	echo '<pre>';
	var_dump($errors);
	echo '</pre>';
}
