<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>POST</title>
</head>
<body>
	<form action="handle.php" method="post">
		<label for="username">Username: </label>
		<input type="text" name="username" id="username">
  
		<label for="email">Email</label>
		<input type="text" name="email" id="email">
        <br /><br />
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
        <br /><br />
        
        <label for="gender"></label>
        Male: <input type="radio" name="gender" id="gender" value="male">
        Female: <input type="radio" name="gender" id="gender" value="female">
		<br /><br />
		<button type="submit" name="login">Login</button>
	</form>
</body>
</html>
