<?php
/*

Controleur : Modifier les informations d'un utilisateur

Paramètres : 
    GET id : l'id de l'utilisateur
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

// SI on ne reçoit pas d'id d'utilisateur
if (empty($_GET["id"])) {
    // ALORS on affiche un message d'erreur
    $error = "Erreur, il n'y a pas d'utilisateur";
} elseif(empty($login) || empty($password) || empty($email) || empty($type) || $type == "") { // SINON SI il manque un élément de saisie
    // ALORS on affiche un message d'erreur 
    $error = "Il y a une erreur de saisie";
    $utilisateurAModifier = new utilisateur();
    // On charge l'utiisateur à partir de l'id récupéré
    $idUtilisateur = $_GET["id"];
    $utilisateurAModifier->recupererUnUtilisateur($idUtilisateur);
    // On affiche le détail
    include "templates/pages/detail_utilisateur.php";
    exit();
} else {
    // SINON on crée un nouvel objet utilisateur
    $utilisateurAModifier = new utilisateur();
    // On charge l'utiisateur à partir de l'id récupéré
    $idUtilisateur = $_GET["id"];
    $utilisateurAModifier->recupererUnUtilisateur($idUtilisateur);
    // On charge les nouvelles informations
    $utilisateurAModifier->setLogin($login);
    $utilisateurAModifier->setPassword($password);
    $utilisateurAModifier->setNom($nom);
    $utilisateurAModifier->setEmail($email);
    $utilisateurAModifier->setType(strtoupper($type));
    // On modifie dans la base de données les nouvelles informations
    $utilisateurAModifier->modifierUtilisateur();
}
// On récupère la liste des utilisateurs
$listeUtilisateurs = $utilisateur->recupererTousLesUtilisateurs();

// Affichage 
include "templates/pages/page_liste_utilisateurs.php";