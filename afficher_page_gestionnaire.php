<?php
/*

Controleur : affichage de la page des membres gestionnaire

Paramètres : néant

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres : néant
$error = null;
$success = null;
// Si il n'y a pas d'utilisateur connecté
if(empty($_SESSION["id"])) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/page_form_connexion.php";
    exit();
} else {
    // SINON on charge l'utilisateur
    $utilisateur = new utilisateur();
    $utilisateur->recupererUnUtilisateur($_SESSION["id"]);
}
// On affichge la liste des projets en attente
$projet = new projet();
$listeProjetsEnAttente = $projet->recupererTousLesProjetsFiltres("ATT");

// Affichage 
include "templates/pages/page_gestionnaire.php";