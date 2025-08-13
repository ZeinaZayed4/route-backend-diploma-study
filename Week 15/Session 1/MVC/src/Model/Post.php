<?php

namespace MVC\src\Model;

use MVC\Model;

class Post extends Model
{
	public function setTable(): void
	{
		$this->table = "posts";
	}
}