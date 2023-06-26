<?php
/*

Controleur : Enregistrer les informations d'un nouvel utilisateur

Paramètres : 
    POST login : le login de l'utilisateur
    POST password : le mot de passe de l'utilisateur
    POST nom : le nom de l'utilisateur
    POST email : l'email de l'utilisateur
    POST type : le type de l'utilisateur

*/

// Initialisation
include "library/init.php";

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

// Récupération des paramètres :
$login = $_POST["login"];
$password = $_POST["password"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$type = $_POST["type"];

// SI un des paramètres n'est pas saisi
if(empty($login) || empty($password) || empty($email) || empty($type) || $type == "") {
    // ALORS on affiche un message d'erreur 
    $error = "Il y a une erreur de saisie";
    // Et on affiche le formulaire de saisie
    $listeUtilisateurs = $utilisateur->recupererTousLesUtilisateurs();
    include "templates/pages/page_form_utilisateur.php";
    exit();
} else {
    // SINON on crée un nouvel objet utilisateur
    $utilisateurAAjouter = new utilisateur();
    // On le charge
    $utilisateurAAjouter->setLogin($login);
    $utilisateurAAjouter->setPassword($password);
    $utilisateurAAjouter->setNom($nom);
    $utilisateurAAjouter->setEmail($email);
    $utilisateurAAjouter->setType(strtoupper($type));
    // On l'insère dans la base de données
    $utilisateurAAjouter->insererUtilisateur();
}

// On affiche la liste des utilisateurs
$listeUtilisateurs = $utilisateur->recupererTousLesUtilisateurs();

// Affichage 
include "templates/pages/page_liste_utilisateurs.php";