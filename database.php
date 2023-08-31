<?php

$host = "localhost";
$dbname = "login-db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
  die("Could not connect:" . $mysqli->connect_error);
}

return $mysqli;