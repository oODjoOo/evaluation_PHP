<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de tâches</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Gestionnaire de tâches</h1>
    <?php if (isset($_SESSION['user_name'])): ?>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="logout.php">Déconnexion <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
    <?php else: ?>
            <a href="index.php">Accueil</a>
        </nav>
    <?php endif; ?>
    <main>