<?php

require_once '../app.php';
require_once '../inc/connection.php';

if ($request->check($request->post('title'))) {
	$title = $request->filter($request->post('title'));
	
	$validation->validate('title', $title, ['Required', 'Str']);
	
	$errors = $validation->getErrors();
	
	if (empty($errors)) {
		$result = $conn->prepare("INSERT INTO `todo` SET `title` = ?");
		$output = $result->execute([$title]);
		
		if ($output) {
			$session->set('success', 'Task added successfully');
		} else {
			$session->set('errors', ["Try again!"]);
		}
	} else {
		$session->set('errors', $errors);
	}
	$request->redirect('../index.php');
} else {
	header("Location: ../index.php");
}
