<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';
include 'inc/header.php';
 

if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}

$query = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $query->fetchAll();
?>

<h2>Liste de vos tâches</h2>

<a href="add_task.php">Ajouter une nouvelle tâche</a>

<ul>
    <?php foreach ($tasks as $task): ?>
        <li> - <?php echo htmlspecialchars($task['title']) ?><a href="delete_task.php?id=<?php echo htmlspecialchars($task['id']) ?>">Supprimer</a></li>
    <?php endforeach; ?>
</ul>

<?php include 'inc/footer.php'; ?>
