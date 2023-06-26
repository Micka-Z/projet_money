<?php
/*

Controleur : accueil du site, préparation de la page principale de l'application

Paramètres : néant

*/


// Initialisations
include "library/init.php";

// Récupération des paramètres : néant
$error = null;
$success = null;

$_SESSION["id"] = 0;

// Affichage 
include "templates/pages/page_principale.php";
?>