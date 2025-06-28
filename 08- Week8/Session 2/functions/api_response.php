<?php

function message($content, $code)
{
	echo json_encode($content);
	http_response_code($code);
}
