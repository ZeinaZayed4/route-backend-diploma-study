<?php

function checkUri(): int
{
	$uri = $_SERVER['REQUEST_URI'];
	$uri_array = explode('/', $uri);
	$id = (int) end($uri_array);
	return $id;
}
