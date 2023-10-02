<?php
session_start();

function verifierConnexion() {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['pseudo'])) {
        // Rediriger vers la page de connexion
        header("Location: connexion.php");
        exit();
    }
}

// Appeler la fonction au début de chaque page protégée
verifierConnexion();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap">
    <style>
        /* Ajoutez ici votre CSS personnalisé pour l'effet du volet d'informations */
        /* ... Votre CSS pour l'effet de volet d'informations ... */
    </style>
</head>
<body>
    <?php
    // Vérifiez si l'utilisateur est connecté (si le nom est stocké dans la session)
    if (isset($_SESSION['pseudo'])) {
        echo '<div class="user-info">Bonjour, ' . htmlspecialchars($_SESSION['pseudo']) . '</div>';
    }

    // Vérifier et afficher le message d'erreur d'inactivité s'il existe
    if (isset($_SESSION['erreur_inactivite'])) {
        echo '<div class="error-message">' . $_SESSION['erreur_inactivite'] . '</div>';
        unset($_SESSION['erreur_inactivite']);  // Effacer le message après l'affichage
    }
    ?>

    <!-- Lien de déconnexion -->
    <a href="deconnexion.php" class="button">Se déconnecter</a>
    <header>
        <h1>Culture Geek</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="News.php">News</a></li>
                <li><a href="articles.php">Articles</a></li>
                <li><a href="video.php">Vidéos</a></li>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

