<?php

/*

Controleur : envoie d'un mail au porteur de projet en cas de refus ou fournir un lien pour visualiser le projet en cas d'acceptation

Paramètres : 
    POST motif : le motif du refus
    POST description : la description mise à jour
    GET id : l'id du projet

*/

// Initialisation
include "library/init.php";
// SI il n'y a pas d'id dans la session (pas d'utilisateur connecté)
if(empty($_SESSION["id"])) {
    // ALORS on returne sur la page de connexion
    include "templates/pages/page_form_connexion.php";
    exit();
} else {
    // SINON on charge un nouvel utilisateur
    $utilisateur = new utilisateur();
    $utilisateur->recupererUnUtilisateur($_SESSION["id"]);
}

// Création des variables utiles
$error = null;
$success = null;
$idProjet = (int)$_GET["id"];
$projet = new projet();
$message = "";

// SI on ne reçoit pas d'id (du projet)
if (empty($idProjet)) {
    // ALORS on affiche un message d'erreur dans le template et on retourne à la page gestionnaire
    $error = "Erreur, il n'y a pas de projet";
    // il faut donc la liste des projets en attente
    $listeProjetsEnAttente = $projet->recupererTousLesProjetsFiltres("ATT");
    // Et on retourne sur la page de gestion principale
    include "templates/pages/page_gestionnaire.php";
    exit();
} else {
    // SINON on crée un nouvel objet projet et on le charge avec l'id récupéré
    $projet->recupererUnProjet($idProjet);
}

// Récupération des paramètres :

// SI on reçoit un motif
if(!empty($_POST["motif"])) {
    // ALORS on met à jour dans la base de données le motif pour le projet concerné
    $motif = $_POST["motif"];
    $projet->setMotif($motif);
    $projet->setStatut("REF");
    $projet->modifierProjet();
    // On crée le message pour le mail
    $message = "Nous avons le regret de vous annoncer que votre projet n'a pas été retenu.
                Motif du refus :
                " . $projet->getMotif() . "

                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre.";

} elseif(!empty($_POST["description"])) { // SINON, SI on reçoit une description
    // ALORS on met à jour la description dans la base de données du projet concerné
    $description = $_POST["description"];
    $projet->setDescription($description);
    $projet->setStatut("VAL");
    // On crée une clé aléatoire
    $projet->setCle(random_str(12));
    $projet->modifierProjet();
    // Le lien pour accéder au projet est composé du nom, du prénom et de la clé
    $message = "Nous avons le plaisir de vous annoncer que votre projet a été accepté.
                Pour visualiser votre projet et l'état d'avancement du financement, veuillez cliquer sur le lien ci-dessous
                ou copier/coller dans votre navigateur Internet.
                
                http://examen.mzimmermann.mywebecom.ovh/afficher_detail_projet.php?cle=" . urlencode($projet->getCle()) . "

                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre.";

} else { // SINON on écrit un message d'erreur
    $error = "Une erreur est survenue lors de la saisie";
}

// Création du mail
$sujet = "Notification de décision concernant votre projet"; // Le sujet du mail
$dest_mail = $projet->getEmail(); // Le destinataire du mail
$dest_nom = $projet->getPrenom() . " " . $projet->getNom(); // Nom et prénom du porteur de projet

// en-têtes :
$entetes = [];  // Tableau vide pour les en-têtes

// FROM
$entetes["From"] = '"Projet" ' . "<mzimmermann@mywebecom.ovh>"; // L'aresse mail avec le @ doit être celle du serveur, ou du système

// REPLY TO : destinataire des réponses
$entetes["Reply-To"] = '"Projet" ' . "<mzimmermann@mywebecom.ovh>";

// Mail HTML :
// Ententes spécifiques
$entetes["MIME-version"] = "1.0";
$entetes["Content-Type"] = "text/html; charset=utf8";
// Le message en format HTML à envoyer
$messageHTML = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf8">
</head>
<body>
    <p>Bonjour</p>
    <p>' . nl2br(htmlentities($message)) . '</p>
</body>
</html>
';

// Destinataire : "nom visible" <adresse>, "nom visible 2" <adresse2>
$destinataire = '"' . $dest_nom . '" ' . "<$dest_mail>";
// L'envoie du mail
mail($destinataire, $sujet, $messageHTML, $entetes);

// Affichage 
$listeProjetsEnAttente = $projet->recupererTousLesProjetsFiltres("ATT");
include "templates/pages/page_gestionnaire.php";





