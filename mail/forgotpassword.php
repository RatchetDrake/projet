<?php
require_once('./mail.php');

$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse_bd = "Azerty";
$nomBaseDeDonnees = "projet";

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse_bd);
    // Configure PDO to throw exceptions on error
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2>Réinitialisation du mot de passe</h2>
        <form action="" method="post">
            <label for="login_identifier">Adresse Email ou Pseudo:</label>
            <input type="text" id="login_identifier" name="email" required>
            <input type="submit" value="Envoyer le lien">
        </form>
        <!-- Links for redirection -->
        <p>Pas encore de compte ? <a href="../inscription.php">Inscrivez-vous ici</a>.</p>
        <p>Déjà un compte ? <a href="../connexion.php">Connectez-vous ici</a>.</p>
    </div>

    <?php
    // ...
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];

        // Préparer et exécuter la requête avec PDO
        $select = $connexion->prepare('SELECT * FROM utilisateurs WHERE email=:email');
        $select->bindParam(':email', $email);
        $select->execute();
        $result = $select->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) === 0) {
            echo '<script> alert("Cette adresse n\'est pas inscrite sur ce site") </script>';
        } else {
            // L'utilisateur existe, générez un token et envoyez l'e-mail
            $user = $result[0];
            $id = $user['id']; // Vous devez remplacer 'id' par le nom de la colonne appropriée contenant l'identifiant dans votre table

            // Génération du token
            $token = GenerateToken(50);

            // Mettre à jour le token dans la base de données
            $updateToken = $connexion->prepare('UPDATE utilisateurs SET token=:token WHERE email=:email AND id=:id');
            $updateToken->bindParam(':token', $token);
            $updateToken->bindParam(':email', $email);
            $updateToken->bindParam(':id', $id);
            $updateToken->execute();

            // Envoi de l'e-mail
            SendEmail($email, $id, $token);

            echo "<div class='div-erreur'>Un e-mail de réinitialisation a été envoyé à l'adresse $email.</div>";
        }
    }
    ?>

</body>

</html>
