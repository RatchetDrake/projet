<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "./PHPMailer/PHPMailerAutoload.php";

/**
 * Cette fonction génère un token unique
 * @param int $length
 * @return string
 */
function GenerateToken($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[mt_rand(0, $max)];
    }
    return $token;
}

/**
 * Cette fonction envoie un email
 * @param string $email - L'adresse e-mail du destinataire
 * @param int $id - L'identifiant (à adapter selon votre utilisation)
 * @param string $token - Le token (à adapter selon votre utilisation)
 */
function SendEmail($email, $id, $token) {
    $subject = "Réinitialisation de mot de passe";
    $message = "Bonjour,\n\n";
    $message .= "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ";
    $message .= "http://localhost/reset_password.php?id=$id&token=$token\n\n";
    $message .= "Cordialement,\nVotre équipe";

    // Configuration de l'envoi du mail
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'ratchetdtest3@outlook.fr'; // Ajustez avec votre adresse email
    $mail->Password = 'Azertyuiop@123'; // Ajustez avec votre mot de passe email
    $mail->CharSet = 'utf-8';
    $mail->setFrom('ratchetdtest3@outlook.fr', 'RatchetDrake'); // Ajustez avec votre nom
    $mail->addAddress($email);

    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        echo "Le mail n'a pas pu être envoyé. Erreur : " . $mail->ErrorInfo;
    } else {
        echo "Le mail a été envoyé avec succès.";
    }
}

?>
