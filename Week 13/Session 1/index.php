<?php

require_once 'app.php';

$users = $database->selectAll('`users`', '`name`, `email`');

echo '<h2>SELECT ALL</h2>';
foreach ($users as $user) {
	echo "Name: {$user['name']}<br/>";
	echo "Email: {$user['email']}<br/>";
	echo '<hr/>';
}

echo '<h2>SELECT WITH CONDITION</h2>';

$usersWithCondition = $database->selectWithCondition('`users`', 'id > 1', '`name`, `email`');
foreach ($usersWithCondition as $user) {
	echo "Name: {$user['name']}<br/>";
	echo "Email: {$user['email']}<br/>";
	echo '<hr/>';
}

echo '<h2>INSERT</h2>';
echo $database->insert('`users`', '`name`, `email`', "'Safa Atef', 'safa@email.com'");
echo '<hr/>';

echo '<h2>SELECT ONE</h2>';
$user = $database->selectOne('`users`', 1, '`name`, `email`');
echo "Name: {$user['name']}<br/>";
echo "Email: {$user['email']}<br/>";
echo '<hr/>';

echo '<h2>UPDATE</h2>';
echo $database->update('`users`', 1, '`name`, `email`', "'Zeina Zayed', 'zeina@email.com'");
echo '<hr/>';

echo '<h2>DELETE</h2>';
echo $database->delete('`users`', 1);
