<?php

if (isset($_SESSION['errors'])) {
	echo "<ul class='alert alert-danger'>";
	foreach ($_SESSION['errors'] as $error) {
		echo "<li class='mx-4'>$error</li>";
	}
	unset($_SESSION['errors']);
	echo "</ul>";
} elseif (isset($_SESSION['success'])) {
	echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
	unset($_SESSION['success']);
}
