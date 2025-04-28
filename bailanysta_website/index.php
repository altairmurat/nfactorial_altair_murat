<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Welcome to gratitude media</h1>
    <a href="register.php">I am new here</a>
    OR
    <a href="login.php">I already have an account</a>
</div>
</body>
</html>
