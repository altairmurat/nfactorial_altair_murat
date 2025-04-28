<?php
require_once 'db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $user_id = $stmt->insert_id;
    $today = date('Y-m-d');
    $streakStmt = $conn->prepare("INSERT INTO streaks (user_id, streak_count, last_entry_date) VALUES (?, 0, ?)");
    $streakStmt->bind_param("is", $user_id, $today);
    $streakStmt->execute();

    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <h2>Create account</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="user name" required>
    <input type="password" name="password" placeholder="password" required>
    <button type="submit">register</button>
  </form>
  <a href="index.php">back</a>
</div>
</body>
</html>
