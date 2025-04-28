<?php
session_start();
require_once 'db/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['entry_id'])) {
    $entry_id = (int)$_POST['entry_id'];
    $conn->query("UPDATE gratitude_entries SET likes = likes + 1 WHERE id = $entry_id");
}

header("Location: dashboard.php");
exit();
?>
