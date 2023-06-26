<?php
/*

Controleur : Vérifier les éléments de connexion saisies et lancer la bon template

Paramètres : 
    POST $login : le login de connexion
    POST $password : le password de connexion

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres : 
$login = $_POST["login"];
$password = $_POST["password"];

// Déclaration des variables d'erreurs;
$error = null;
$success = null;

// SI les informations de connexion ne sont pas renseignées
if (empty($login) || empty($password)) {
    // ALORS on affiche un message d'erreur dans le template
    $error = "Erreur, un champ de saisie n'est pas rempli";
    include "templates/pages/page_form_connexion.php";
    exit;
} else {

    // Récupérer un utilisateur en fonction de son login
    $utilisateur = new utilisateur();
    // SI l'utilisateur n'est pas chargé et qu'il n'est pas désactivé
    if (!$utilisateur->recupererUnUtilisateurParLogin($login) && $utilisateur->getType() == "DESA") {
        // ALORS on vide la session et on affiche un message d'erreur
        $_SESSION["id"] = 0;
        // On crée un message d'erreur
        $error = "Erreur, login introuvable";
        // On affiche la page de connexion
        include "templates/pages/page_form_connexion.php";
        exit;
    }

    // On a un utilisateur chargé
    // SI le mot de passe haché n'est pas bon
    if (!password_verify($password, $utilisateur->getPassword())) {
        // ALORS on vide la session et on affiche un message d'erreur
        // Vider $_SESSION["id"]
        $_SESSION["id"] = 0;
        // ON crée un mesage d'erreur
        $error = "Erreur, le mot de passe saisi ne correspond pas";
        // On affiche la page de connexion
        include "templates/pages/page_form_connexion.php";
        exit;
    }

    // On la session par l'id de l'utilisateur qui s'est connecté
    $_SESSION["id"] = $utilisateur->id();

    // Si l'utilisateur est un gestionnaire, ALORS on affiche son template et sa liste de projets
    if($utilisateur->getType() == "GEST") {
        $projet = new projet();
        $listeProjetsEnAttente = $projet->recupererTousLesProjetsFiltres("ATT");
        include "templates/pages/page_gestionnaire.php";
    } elseif($utilisateur->getType() == "INVE") { // SINON Si c'est un investisseur, on affiche sa page de présentation
        include "templates/pages/page_investisseur.php";        
    } else {
        // SINON on vide la session et on affiche un message d'erreur sur la page de connexion
        $_SESSION["id"] = 0;
        $error = "Veuillez vous reconnecter\n
                  Une erreur est survenue\n
                  Si vous n'arrivez toujours pas à vous connecter, contactez l'administrateur du site";
        include "templates/pages/page_form_connexion.php"; 
    }
}


