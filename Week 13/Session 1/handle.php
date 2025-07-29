<?php

require_once 'classes/Request.php';

use Classes\Request;

$request = new Request();

if ($request->check($request->post('submit'))) {
	$name = $request->filter($request->post('name'));
	
	echo $name;
} else {
	$request->redirect('form.php');
}
