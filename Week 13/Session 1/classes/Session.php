<?php

namespace Classes;

class Session
{
	public function __construct()
	{
		session_start();
	}
	
	public function set(string $key, mixed $value): void
	{
		$_SESSION[$key] = $value;
	}
	
	public function get(string $key): mixed
	{
		return $_SESSION[$key];
	}
	
	public function remove(string $key): void
	{
		unset($_SESSION[$key]);
	}
	
	public function delete(): void
	{
		session_destroy();
	}
}