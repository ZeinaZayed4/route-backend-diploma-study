<?php

require_once 'Classes\Request.php';
require_once 'Classes\Session.php';
require_once 'Validation\Validator.php';
require_once 'Validation\Validation.php';
require_once 'Validation\Required.php';
require_once 'Validation\Str.php';

use Classes\Request;
use Classes\Session;
use Validation\Validator;
use Validation\Validation;
use Validation\Required;
use Validation\Str;

$request = new Request();
$session = new Session();
$validation = new Validation();
$required = new Required();
$str = new Str();
