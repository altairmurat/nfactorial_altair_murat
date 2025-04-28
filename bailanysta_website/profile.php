<?php
session_start();
require_once 'db/config.php';

if (!isset($_GET['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$profile_id = (int)$_GET['user_id'];
$userInfo = $conn->query("SELECT username FROM users WHERE id = $profile_id")->fetch_assoc();

if (!$userInfo) {
    echo "Пользователь не найден.";
    exit();
}

$entries = $conn->query("SELECT * FROM gratitude_entries WHERE user_id = $profile_id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Profile <?= htmlspecialchars($userInfo['username']) ?></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <h2>Profile @<?= htmlspecialchars($userInfo['username']) ?></h2>
  <div class="feed">
    <?php while($row = $entries->fetch_assoc()): ?>
      <div class="entry">
        <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
        <span class="date"><?= $row['created_at'] ?></span>
      </div>
    <?php endwhile; ?>
  </div>
  <a href="dashboard.php">back</a>
</div>
</body>
</html>
