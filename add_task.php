<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';
include 'inc/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);

        $result = $pdo->prepare('INSERT INTO tasks (`title`) VALUES (:title)');
        $result->bindParam(':title', $title);
        $result->execute();
        header("Location: tasks.php");
    exit();
   
}
?>

<h2>Ajouter une tâche</h2>
<form action="add_task.php" method="POST">
    <input type="text" name="title" placeholder="Nouvelle tâche">
    <button type="submit">Ajouter</button>
</form>

<?php include 'inc/footer.php'; ?>
