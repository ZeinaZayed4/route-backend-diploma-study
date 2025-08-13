<?php

namespace MVC;

class Request
{
	public function queryString()
	{
		return $_SERVER['QUERY_STRING'];
	}
}