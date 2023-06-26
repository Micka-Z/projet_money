<?php
/*

Controleur : Désactiver un utilisateur

Paramètres : 
    GET id : l'id de l'utilisateur

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

// SI on ne reçoit pas d'id d'un utilisateur
if (empty($_GET["id"])) {
    // ALORS on affiche un message d'erreur et on retourne à la page des listes d'utilisateurs
    $error = "Erreur, il n'y a pas d'utilisateur";
} else {
    // SINON on crée un nouvel objet utilisateur
    $utilisateurADesactiver = new utilisateur();
    // On charge l'utiisateur à partir de l'id récupéré
    $idUtilisateur = $_GET["id"];
    $utilisateurADesactiver->recupererUnUtilisateur($idUtilisateur);
    // On met à jour son statut
    $utilisateurADesactiver->setType("DESA");
    $utilisateurADesactiver->modifierUtilisateur();
}

// ON crée la liste des utilisateurs pour l'affichage
$listeUtilisateurs = $utilisateur->recupererTousLesUtilisateurs();

// Affichage 
include "templates/pages/page_liste_utilisateurs.php";