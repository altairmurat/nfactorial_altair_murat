<?php
session_start();
require_once 'db/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = trim($_POST['content']);
    if ($content != '') {
        $stmt = $conn->prepare("INSERT INTO gratitude_entries (user_id, content) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $content);
        $stmt->execute();

        // Стрик обновление
        $today = date('Y-m-d');
        $streakData = $conn->query("SELECT last_entry_date, streak_count FROM streaks WHERE user_id = $user_id")->fetch_assoc();

        if ($streakData) {
            if ($streakData['last_entry_date'] !== $today) {
                $newStreak = $streakData['streak_count'] + 1;
                $conn->query("UPDATE streaks SET streak_count = $newStreak, last_entry_date = '$today' WHERE user_id = $user_id");
            }
        } else {
            $conn->query("INSERT INTO streaks (user_id, streak_count, last_entry_date) VALUES ($user_id, 1, '$today')");
        }
    }
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Add gratitude</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <h2>What made you happy today?</h2>
  <form method="POST">
    <textarea name="content" placeholder="I am grateful for..." required></textarea>
    <button type="submit">Add</button>
  </form>
  <a href="dashboard.php">back</a>
</div>
</body>
</html>
