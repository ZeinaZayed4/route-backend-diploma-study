<?php

session_start();
require_once '../inc/database.php';
require_once 'validate.php';

if (isset($_POST['submit'])) {
	$title = sanitize($_POST['title']);
	$body = sanitize($_POST['body']);
	$image = $_FILES['image'];
	$user_id = $_SESSION['user_id'];
	
	$errors = [];
	$errors = array_merge($errors, validateTitle($title), validateBody($body), validateImage($image));
	
	if (empty($errors)) {
		$new_image_name = uploadImage($image);
		$query = "INSERT INTO `posts` (`title`, `body`, `image`, `user_id`) VALUES ('$title', '$body', '$new_image_name', $user_id)";
		$result = mysqli_query($conn, $query);
		
		if ($result) {
			$_SESSION['success'] = "Post added successfully!";
			header("Location: ../index.php");
		} else {
			$_SESSION['errors'] = ["Error adding post"];
			header("Location: ../addPost.php");
		}
	} else {
		$_SESSION['title'] = $title;
		$_SESSION['body'] = $body;
		$_SESSION['errors'] = $errors;
		header("Location: ../addPost.php");
	}
} else {
	header("Location: ../addPost.php");
}
