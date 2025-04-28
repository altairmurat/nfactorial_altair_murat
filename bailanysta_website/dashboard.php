<?php
session_start();
require_once 'db/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$entries = $conn->query("SELECT g.*, u.username FROM gratitude_entries g JOIN users u ON g.user_id = u.id ORDER BY g.created_at DESC");

$streakResult = $conn->query("SELECT streak_count FROM streaks WHERE user_id = $user_id");
$streak = ($streakResult && $streakResult->num_rows > 0) ? $streakResult->fetch_assoc()['streak_count'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>lenta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <div class="top-bar">
    <div>
      <h2>your gratitude lenta</h2>
      <p>current streak <strong><?= $streak ?></strong> days</p>
    </div>
    <div>
      <span>my profile <a href="profile.php?user_id=<?= $user_id ?>"><?= htmlspecialchars($username) ?></a></span><br><br>
      <a href="add_entry.php" class="btn"> add gratitude post</a>
      <a href="instant_mood.php" class="btn">I feel bad..</a>
      <a href="logout.php" class="btn"> logout</a>
    </div>
  </div>

  <div class="feed">
    <?php while($row = $entries->fetch_assoc()): ?>
      <div class="entry">
        <p><strong><a href="profile.php?user_id=<?= $row['user_id'] ?>">@<?= htmlspecialchars($row['username']) ?></a></strong>:</p>
        <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
        <form onsubmit="event.preventDefault(); toggleLike(<?= $row['id'] ?>);">
            <button type="submit" id="like-btn-<?= $row['id'] ?>">❤️ <span id="like-count-<?= $row['id'] ?>"><?= $row['likes'] ?></span></button>
        </form>
        <span class="date"><?= $row['created_at'] ?></span>
      </div>
    <?php endwhile; ?>
  </div>
</div>
<script>
function toggleLike(entryId) {
    fetch('like_toggle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'entry_id=' + entryId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('like-count-' + entryId).innerText = data.likes;
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
</body>
</html>
