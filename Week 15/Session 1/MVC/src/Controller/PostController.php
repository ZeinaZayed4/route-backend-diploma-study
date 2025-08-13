<?php

namespace MVC\src\Controller;

use MVC\src\Model\Post;
use MVC\View;

class PostController
{
	public function all(): void
	{
		$post = new Post();
		$data = $post->selectAll();
		
		View::render('allPosts.php', $data);
	}
}