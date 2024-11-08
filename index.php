<?php
session_start();

require_once 'config/database.php';
include 'inc/header.php';

if (isset($_SESSION['user_name'])) {
    header("Location: tasks.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));

    if (!empty($name) && !empty($email)) {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :email AND name = :name");
        $query->bindParam(':email', $email);
        $query->bindParam(':name', $name);
        $query->execute();
        $user = $query->fetch();

        if ($user) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: tasks.php");
            exit;
        } else {
            echo "Nom ou email incorrect. Veuillez vérifier vos informations.";
        }
    } else {
        echo "Veuillez entrer un nom ou un email valides.";
    }
} 
?>

<h2>Bienvenue dans votre gestionnaire de tâches</h2>
<form action="" method="POST">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    
    <button type="submit">Se Connecter</button>
</form>

<?php include 'inc/footer.php'; ?>


