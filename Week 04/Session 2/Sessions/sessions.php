<?php
//session_start();
//
//$id = $_GET['id'];
//
//$_SESSION['name'] = 'Zeina';
//$_SESSION['id'] = $id;
//
//header("Location: testSessions.php");
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sessions</title>
</head>
<body>
	<form action="handle.php" method="post">
		<label for="name">Name</label>
		<input type="text" name="name" id="name">
		<button type="submit" name="submit">Login</button>
	</form>
</body>
</html>
