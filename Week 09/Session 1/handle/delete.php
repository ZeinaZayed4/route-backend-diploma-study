<?php

session_start();
require_once '../inc/database.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$query = "SELECT * FROM `posts` WHERE id = $id";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {
		$post = mysqli_fetch_assoc($result);
		$old_image = $post['image'];
		
		$delete_query = "DELETE FROM `posts` WHERE `id` = $id";
		$delete_result = mysqli_query($conn, $delete_query);
		
		if ($delete_result) {
			if (!empty($old_image)) {
				unlink("../uploads/$old_image");
			}
			$_SESSION['success'] = "Post deleted successfully.";
			header("Location: ../index.php");
		} else {
			$_SESSION['errors'] = ["Error deleting post."];
			header("Location: ../viewPost?id=$id");
		}
	} else {
		header("Location: ../404.php");
	}
} else {
	header("Location: ../viewPost.php?id=$id");
}
