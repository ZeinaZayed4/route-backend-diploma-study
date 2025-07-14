<?php

if (isset($_SESSION['errors'])) {
    echo "<div class='alert alert-danger'>";
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br />';
        }
        unset($_SESSION['errors']);
    echo "</div>";
} elseif (isset($_SESSION['success'])) {
	echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
    unset($_SESSION['success']);
}
