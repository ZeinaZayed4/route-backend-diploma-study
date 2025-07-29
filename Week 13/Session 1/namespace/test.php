<?php

require_once 'classes/User.php';
require_once 'User.php';

use Route\Week14\Classes\User;
use Route\Week14\User as UserTwo;

$user1 = new User();
$user2 = new UserTwo();

$user1->welcome();
$user2->welcome();
