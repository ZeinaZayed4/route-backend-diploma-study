<?php

$conn = new PDO('mysql:host=localhost;dbname=route_oop', 'root', '');

$result = $conn->query('SELECT * FROM `users`');

$users = $result->fetchAll(PDO::FETCH_ASSOC);

if (count($users) > 0) {
	echo '<pre>';
	var_dump($users);
	echo '</pre>';
}

echo '<hr />';

$result = $conn->query('SELECT * FROM `users` WHERE `id` = 2');

$user = $result->fetch(PDO::FETCH_ASSOC);

if (count($user) > 0) {
	echo '<pre>';
	var_dump($user);
	echo '</pre>';
}

echo '<hr />';

$result = $conn->query("INSERT INTO `users` SET `name` = 'Ohoud', `email` = 'ohoud@email.com'");

if ($result) {
	echo 'User added successfully!<br />';
} else {
	echo "Can't add user.<br />";
}

echo '<hr />';

$result = $conn->query("UPDATE `users` SET `name` = 'Ohoud Zayed' WHERE `id` = 7");

$result->execute();

if ($result) {
	echo 'User updated successfully!<br />';
} else {
	echo "Can't update user.<br />";
}
