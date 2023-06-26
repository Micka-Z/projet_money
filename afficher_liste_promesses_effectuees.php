<?php
/*

Controleur : affichage de la liste des promesses effectuées

Paramètres : néant

*/

// Initialisations
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
// On crée la liste des promesses effectuées
$promesse = new promesse();
$listePromessesEffectuees = $promesse->recupererPromessesUnUtilisateur($utilisateur->id());

// Affichage 
include "templates/pages/page_liste_promesses_effectuees.php";