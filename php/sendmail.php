<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '..';
require __DIR__ . '..';
require __DIR__ . '..';

// Sanitize form inputs
$name = htmlspecialchars($_POST["name"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$surname = htmlspecialchars($_POST["surname"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$age = htmlspecialchars($_POST["age"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$phone = htmlspecialchars($_POST["phone"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$email = htmlspecialchars($_POST["email"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$sports = htmlspecialchars($_POST["sports"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$level = htmlspecialchars($_POST["level"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$goal = htmlspecialchars($_POST["goal"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$sessions = htmlspecialchars($_POST["sessions"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$tpsseance = htmlspecialchars($_POST["tpsseance"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$injury = htmlspecialchars($_POST["injury"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$injury_details = htmlspecialchars($_POST["injury_details"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$mouvements = htmlspecialchars($_POST["mouvements"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$aisance = htmlspecialchars($_POST["aisance"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$aisance_details = htmlspecialchars($_POST["aisance_details"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$allergies = htmlspecialchars($_POST["allergies"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$activity_level = htmlspecialchars($_POST["activity_level"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$activity_level_details = htmlspecialchars($_POST["activity_level_details"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$mensurations = htmlspecialchars($_POST["mensurations"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$commitment = htmlspecialchars($_POST["commitment"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$commitment_details = htmlspecialchars($_POST["commitment_details"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$source = htmlspecialchars($_POST["source"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$entretien = htmlspecialchars($_POST["entretien"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$message = htmlspecialchars($_POST["message"] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

// Format email body
$body = <<<EOD
Prénom: $name
Nom: $surname
Âge: $age
Numéro de téléphone: $phone
Email: $email
Sports pratiqués: $sports
Niveau en musculation: $level
Objectif: $goal
Séances par semaines: $sessions
Temps consacré à chaque séance: $tpsseance
Blessé/déjà été blessé: $injury
Détails: $injury_details
Mouvements qui posent problèmes: $mouvements
Exercices pas sentis de faire: $aisance
Détails: $aisance_details
Allergies: $allergies
Activité: $activity_level
Détails: $activity_level_details
Mensurations: $mensurations
Prêt à relever le défi: $commitment
Comment es-tu tombé sur mon service de coaching?: $source

Entretien téléphonique: $entretien

Message et retours: $message
EOD;

try {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = '...';
    $mail->SMTPAuth = true;
    $mail->Username = '...';
    $mail->Password = '....';   
    $mail->SMTPSecure = ...;
    $mail->Port = ...;

    // Recipients
    $mail->setFrom('remi@remiathlx.fr', 'remi');
    $mail->addAddress('remi.athlx@gmail.com');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'Nouvelle demande de coaching';
    $mail->Body    = $body;

    $mail->send();
    echo 'Message envoyé avec succès !';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
}
?>
