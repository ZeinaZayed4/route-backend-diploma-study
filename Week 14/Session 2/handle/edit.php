<?php

require_once '../app.php';
require_once '../inc/connection.php';

if ($request->check($request->post('submit')) && $request->check($request->get('id'))) {
	$id = $request->get('id');
	$title = $request->post('title');
	
	$validation->validate('title', $title, ['Required', 'Str']);
	$errors = $validation->getErrors();
	
	if (empty($errors)) {
		$result = $conn->prepare('SELECT `title` FROM `todo` WHERE `id` = ?');
		$result->execute([$id]);
		
		if ($result->rowCount() === 1) {
			$result = $conn->prepare('UPDATE `todo` SET `title` = ? WHERE `id` = ?');
			$output = $result->execute([$title, $id]);
			
			if ($output) {
				$session->set('success', 'Task updated successfully');
				$request->redirect('../index.php');
			} else {
				$session->set('errors', ['Try again!']);
				$request->redirect('../edit.php?id=' . $id);
			}
		} else {
			$session->set('errors', ['Task not found']);
			$request->redirect('../index.php');
		}
	} else {
		$session->set('errors', $errors);
		$request->redirect('../edit.php?id=' . $id);
	}
	
} else {
	$request->redirect('../index.php');
}
