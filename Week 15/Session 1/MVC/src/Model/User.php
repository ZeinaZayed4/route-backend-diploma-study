<?php

namespace MVC\src\Model;

use MVC\Model;

class User extends Model
{
	public function setTable(): void
	{
		$this->table = "users";
	}
}