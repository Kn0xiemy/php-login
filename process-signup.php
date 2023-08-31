<?php

if (empty($_POST["name"])) {
  die("Please fill out the Name field.");
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
  die("Please enter a valid email address.");
}

if (strlen($_POST["password"]) < 6) {
  die("Password must contain at least 6 characters.");
}

if ( !preg_match("/[a-z]/i", $_POST["password"])) {
  die("Password must contain at least one letter.");
}

if ( !preg_match("/[0-9]/", $_POST["password"])) {
  die("Password must contain at least one number.");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
  die("Both password fields must match.");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT); // password hashing to prevent data being stolen

$mysqli = require __DIR__ . "/database.php";


// injection prevention
$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
  die("SQL Error:" . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
  header("Location: signup-success.html");
  exit;

}else{

  if ($mysqli->errno === 1062) {
    die("Email is already taken.");

  } else {

  die($mysqli->error . " " . $mysqli->errno);
  }
}