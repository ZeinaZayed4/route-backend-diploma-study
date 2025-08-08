<?php

require_once '../app.php';
require_once '../inc/connection.php';

if ($request->check($request->get('status')) && $request->check($request->get('id'))) {
	$id = $request->get('id');
	$status = $request->get('status');
	
	$result = $conn->prepare('SELECT * FROM `todo` WHERE `id` = ?');
	$result->execute([$id]);
	
	if ($result->rowCount() === 1) {
		$result = $conn->prepare('UPDATE `todo` SET `status` = ? WHERE `id` = ?');
		$output = $result->execute([$status, $id]);
		
		if ($output) {
			$session->set('success', 'Task status updated');
		} else {
			$session->set('errors', ["Can't update task status"]);
		}
	} else {
		$session->set('errors', ['Task not found']);
	}
	$request->redirect('../index.php');
}
