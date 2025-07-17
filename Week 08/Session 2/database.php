<?php

header("content-type: application/json; charset=UTF-8");
header("access-allow-origin: *");

$host = "localhost";
$username = "root";
$password = "";
$database = "route_test";

$conn = mysqli_connect($host, $username, $password, $database);
