<?php

namespace MVC;

class View
{
	public static function render(string $file, array $data): void
	{
		$path = "D:\laragon\www\Route-Study\Week 15\Session 1\MVC\src\View\\$file";
		extract($data);
		
		include $path;
	}
}