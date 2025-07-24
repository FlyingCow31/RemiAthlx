<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
     $to = "gael.tournier32@gmail.com";
     $subject = "Test";
     
     
     $name = htmlspecialchars($_POST["name"]);
     $surname = htmlspecialchars($_POST["surname"]);
     $age = htmlspecialchars($_POST["age"]);
     $phone = htmlspecialchars($_POST["phone"]);
     $email = htmlspecialchars($_POST["email"]);
     $sports = htmlspecialchars($_POST["sports"]);
     $level = htmlspecialchars($_POST["level"]);
     $goal = htmlspecialchars($_POST["goal"]);
     $sessions = htmlspecialchars($_POST["sessions"]);
     $tpsseance = htmlspecialchars($_POST["tpsseance"]);
     $injury = htmlspecialchars($_POST["injury"]);
     $injury_details = htmlspecialchars($_POST["injury_details"]);
     $mouvements = htmlspecialchars($_POST["mouvements"]);
     $aisance = htmlspecialchars($_POST["aisance"]);
     $aisance_details = htmlspecialchars($_POST["aisance_details"]);
     $allergies = htmlspecialchars($_POST["allergies"]);
     $activity_level = htmlspecialchars($_POST["activity_level"]);
     $activity_level_details = htmlspecialchars($_POST["activity_level_details"]);
     $mensurations = htmlspecialchars($_POST["mensurations"]);
     $commit = htmlspecialchars($_POST["commit"]);
     $source = htmlspecialchars($_POST["source"]);
     $entretien = htmlspecialchars($_POST["entretien"]);
     $message = htmlspecialchars($_POST["message"]);

     $headers ="From: $name, $surname, $email.\r\n";
     
     $body = "Prénom: $name\nNom: $surname\nÂge: $age\nNuméro de téléphone: $phone\nEmail: $email\nSports 
     pratiqués: $sports\nNiveau en musculation: $level\nObjectif: $goal\nSéances par semaines: $sessions\n
     Temps consacré à chaque séances: $tpsseance\nBlessé/déja été blessé: $injury\nDétails: $injury_details\n
     Mouvements qui posent problèmes: $mouvements\nExercices pas sentis de faire: $aisance\nDétails: 
     $aisance_details\nAllergies: $allergies\nActivité: $activity_level\nDétails: $activity_level_details\n
     Mensurations: $mensurations\nPrêt à relever le défi: $commit\nComment est-tu tombé sur mon service de coaching? $source\n
     \n\n\nEntretien téléphonique: $entretien\n\nMessage et retours: $message";
     if (mail($to,$subject,$body,$headers)) {
          echo "Message Sent successfully!";
     } else {
          echo "Failed to send message.";
     }
     file_put_contents('debug.log', print_r($_POST, true), FILE_APPEND);
}

?>