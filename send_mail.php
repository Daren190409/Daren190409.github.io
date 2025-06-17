<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Mauvaise entrée, retourne une erreur
        http_response_code(400);
        echo "Merci de remplir correctement le formulaire.";
        exit;
    }

    $recipient = "badier.daren@lpmendesfrance.com";
    $subject = "Nouveau message de $name depuis votre portfolio";

    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Merci! Votre message a été envoyé.";
    } else {
        http_response_code(500);
        echo "Oops! Une erreur est survenue, veuillez réessayer.";
    }

} else {
    http_response_code(403);
    echo "Erreur: méthode non autorisée.";
}
?>
