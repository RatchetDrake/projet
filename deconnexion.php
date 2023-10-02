<?php
session_start();

// Constantes pour le temps d'inactivité et l'URL de redirection après déconnexion
define('INACTIVE_TIMEOUT', 300);  // 300 secondes = 5 minutes
define('REDIRECT_URL', 'connexion.php');  // Mettez ici votre URL de redirection après déconnexion

// Vérifier si le dernier temps d'activité est défini
if (isset($_SESSION['last_activity'])) {
    // Vérifier si le temps d'inactivité a été dépassé
    if (time() - $_SESSION['last_activity'] > INACTIVE_TIMEOUT) {
        // La session a dépassé le temps d'inactivité, déconnexion de l'utilisateur
        session_unset();
        session_destroy();
        $_SESSION['erreur_inactivite'] = "Vous avez été déconnecté en raison d'une inactivité prolongée.";
        header("Location: " . REDIRECT_URL);  // Rediriger vers la page de connexion
        exit();
    }
}

// Mettre à jour le temps de dernière activité
$_SESSION['last_activity'] = time();

// Rediriger vers la page de connexion (ou autre page) après déconnexion
header("Location: " . REDIRECT_URL);
exit();
?>
