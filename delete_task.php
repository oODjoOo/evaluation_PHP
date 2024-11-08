<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
    $result->execute([$id]);
}

header("Location: index.php");
exit;
?>
