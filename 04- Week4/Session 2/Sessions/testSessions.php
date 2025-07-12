<?php

session_start();

if (isset($_SESSION['type']) && $_SESSION['type'] == 'user') {
	echo "Welcome {$_SESSION['name']}";
} else {
	header("Location: sessions.php");
}
