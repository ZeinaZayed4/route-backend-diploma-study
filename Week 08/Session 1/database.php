<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "route_test";

$conn = mysqli_connect($hostname, $username, $password, $database);
