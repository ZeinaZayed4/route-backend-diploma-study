<?php

namespace Classes;

class Request
{
	public function get(string $key): mixed
	{
		if (isset($_GET[$key]))
			return $_GET[$key];
		
		return false;
	}
	
	public function post(string $key): mixed
	{
		if (isset($_POST[$key]))
			return $_POST[$key];
		
		return false;
	}
	
	public function check($key): bool
	{
		return isset($key);
	}
	
	public function filter($key): string
	{
		return trim(htmlspecialchars($key));
	}
	
	public function redirect(string $path): void
	{
		header("Location: $path");
		exit();
	}
}