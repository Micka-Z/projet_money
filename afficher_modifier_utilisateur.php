<?php
/*

Controleur : Afficher la page de modification d'un utilisateur

Paramètres : 
    GET id : l'id de l'utilisateur

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

// SI on ne récupère pas d'id d'utilisateur
if (empty($_GET["id"])) {
    // ALORS on affiche un message d'erreur dans le template et on retourne à la page des listes d'utilisateurs
    $error = "Erreur, il n'y a pas d'utilisateur";
    $listeUtilisateurs = $utilisateur->recupererTousLesUtilisateurs();
    // Affichage 
    include "templates/pages/page_liste_utilisateurs.php";
    exit();
} else {
    // SINON on crée un nouvel objet utilisateur
    $utilisateurAModifier = new utilisateur();
    // On charge l'utiisateur à partir de l'id récupéré
    $idUtilisateur = $_GET["id"];
    $utilisateurAModifier->recupererUnUtilisateur($idUtilisateur);
}

// Affichage 
include "templates/pages/detail_utilisateur.php";