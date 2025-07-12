<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$name = $_POST['name'];
	$_SESSION['name'] = $name;
	$_SESSION['type'] = 'user';
	
	header("Location: testSessions.php");
} else {
	header("Location: sessions.php");
}
