<?php

require_once '../app.php';
require_once '../inc/connection.php';

if ($request->check($request->get('id'))) {
	$id = $request->get('id');
	
	$result = $conn->prepare('SELECT * FROM `todo` WHERE `id` = ?');
	$result->execute([$id]);
	
	if ($result->rowCount() === 1) {
		$result = $conn->prepare('DELETE FROM `todo` WHERE `id` = ?');
		$output = $result->execute([$id]);
		
		if ($output) {
			$session->set('success', 'Task deleted successfully');
		} else {
			$session->set('errors', ['Try again!']);
		}
	} else {
		$session->set('errors', ['Task not found']);
	}
	$request->redirect('../index.php');
}
