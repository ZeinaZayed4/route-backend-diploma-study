<?php

require_once 'classes/Session.php';
require_once 'classes/Request.php';
require_once 'classes/Database.php';

use Classes\Session;
use Classes\Request;
use Classes\Database;

$session = new Session();

$session->set('name', 'Zeina Zayed');
echo $session->get('name') . '<br/>';
$session->remove('name');
echo $session->get('name') . '<br/>';

$request = new Request();
echo $request->get('name');

$database = new Database('localhost', 'root', '', 'route_oop');
