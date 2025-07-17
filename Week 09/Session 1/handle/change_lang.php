<?php

session_start();

if (isset($_GET['lang'])) {
	$lang = $_GET['lang'];
	
	if ($lang == 'ar') {
		$_SESSION['lang'] = 'ar';
	} else {
		$_SESSION['lang'] = 'en';
	}
} else {
	$_SESSION['lang'] = 'en';
}

$redirect_url = '../index.php';

if (!empty($_SERVER['HTTP_REFERER'])) {
	$redirect_url = $_SERVER['HTTP_REFERER'];
}

header("Location: $redirect_url");
exit();
