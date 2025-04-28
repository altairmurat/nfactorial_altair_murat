<?php
session_start();
require_once 'db/config.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['entry_id'])) {
    echo json_encode(['success' => false]);
    exit();
}

$user_id = $_SESSION['user_id'];
$entry_id = (int) $_POST['entry_id'];

$check = $conn->prepare("SELECT * FROM likes WHERE user_id = ? AND entry_id = ?");
$check->bind_param("ii", $user_id, $entry_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    $conn->query("DELETE FROM likes WHERE user_id = $user_id AND entry_id = $entry_id");
    $conn->query("UPDATE gratitude_entries SET likes = likes - 1 WHERE id = $entry_id");
} else {
    $conn->query("INSERT INTO likes (user_id, entry_id) VALUES ($user_id, $entry_id)");
    $conn->query("UPDATE gratitude_entries SET likes = likes + 1 WHERE id = $entry_id");
}

$likes = $conn->query("SELECT likes FROM gratitude_entries WHERE id = $entry_id")->fetch_assoc()['likes'];

echo json_encode(['success' => true, 'likes' => $likes]);
?>
