<?php

namespace MVC;

class Routing
{
	private string $url;
	private string $controller;
	private string $method;
	
	public function __construct($object)
	{
		$this->url = $object->queryString();
	}
	
	public function route(): void
	{
		$urlArray = explode('/', $this->url);
		$this->controller = ucfirst($urlArray[0]) . 'Controller';
		$this->method = $urlArray[1];
	}
	
	public function callMethod(): void
	{
		$this->controller = "MVC\src\Controller\\" . $this->controller;
		$newController = new $this->controller;
		
		call_user_func([$newController, $this->method]);
	}
}