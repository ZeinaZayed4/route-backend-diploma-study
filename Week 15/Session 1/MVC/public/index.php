<?php

require_once '../../vendor/autoload.php';

use MVC\Request;
use MVC\Routing;


$request = new Request();
$routing = new Routing($request);

$routing->route();
$routing->callMethod();
