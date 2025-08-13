<?php

namespace MVC\src\Controller;

use MVC\src\Model\User;
use MVC\View;

class UserController
{
	public function all(): void
	{
		$user = new User();
		$data['users'] =  $user->selectAll();
		
		View::render('allUsers.php', $data);
	}
}