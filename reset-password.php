<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);
$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
  die("Token not found");
}

if (strtotime($user["reset_token_expires_at"])<= time()) {
  die("token has expired");
}

echo "token is valid";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>Document</title>
</head>
<body>
  <h1>Reset Password</h1>
  <form action="process-reset-password.php" method="post">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token)?>">
    <label for="password">New password</label>
    <input type="password" id="password">

    <label for="password_confirmation">Repeat Password</label>
    <input type="password" id="password_confirmation">

    <button>Send</button>
  </form>
</body>
</html>