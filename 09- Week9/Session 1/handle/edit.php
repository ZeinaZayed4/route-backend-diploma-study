<?php

session_start();
require_once '../inc/database.php';
require_once 'validate.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$query = "SELECT * FROM `posts` WHERE id = $id";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {
		$post = mysqli_fetch_assoc($result);
		$old_image_name = $post['image'];
		
		$title = sanitize($_POST['title']);
		$body = sanitize($_POST['body']);
		$image = $_FILES['image'];
		
		$errors = [];
		$errors = array_merge($errors, validateTitle($title), validateBody($body));
		
		$new_image_name = $old_image_name;
		
		if (!empty($image['name'])) {
			$imageErrors = validateImage($image);
			if (!empty($imageErrors)) {
				$errors = array_merge($errors, $imageErrors);
			} else {
				$new_image_name = uploadImage($image);
				if (!$new_image_name) {
					$errors[] = "Failed to upload image.";
				}
			}
		}
		
		if (empty($errors)) {
			$query = "UPDATE `posts` SET `title` = '$title', `body` = '$body', `image` = '$new_image_name' WHERE `id` = $id";
			$result = mysqli_query($conn, $query);
			
			if ($result) {
				if (!empty($_FILES['image']['name']) && $old_image_name !== $new_image_name && !empty($old_image_name)) {
					if (file_exists("../uploads/" . $old_image_name)) {
						unlink("../uploads/" . $old_image_name);
					}
				}
				$_SESSION['success'] = "Post updated successfully!";
				header("Location: ../index.php");
			} else {
				if (!empty($_FILES['image']['name']) && $new_image_name !== $old_image_name) {
					if (file_exists("../uploads/" . $new_image_name)) {
						unlink("../uploads/" . $new_image_name);
					}
				}
				$_SESSION['errors'] = ["Error updating post"];
				header("Location: ../editPost.php?id=$id");
			}
		} else {
			if (!empty($_FILES['image']['name']) && $new_image_name !== $old_image_name) {
				if (file_exists("../uploads/" . $new_image_name)) {
					unlink("../uploads/" . $new_image_name);
				}
			}
			
			$_SESSION['title'] = $title;
			$_SESSION['body'] = $body;
			$_SESSION['errors'] = $errors;
			header("Location: ../editPost.php?id=$id");
		}
	} else {
		header("Location: 404.php");
	}
} else {
	header("Location: ../editPost.php?id=$id");
}
