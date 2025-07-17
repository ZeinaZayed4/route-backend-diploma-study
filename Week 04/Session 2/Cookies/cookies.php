<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies</title>
</head>
<body>
	<form action="handle.php" method="post">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?= $_COOKIE['email'] ?? '' ?>">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="<?= $_COOKIE['email'] ?? '' ?>">
		<br /><br />
		<button type="submit" name="submit">Login</button>
	</form>
</body>
</html>