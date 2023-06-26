<?php
/*

Controleur : affichage du formulaire de connexion

Paramètres : néant

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres : néant
$error = null;
$success = null;
$_SESSION["id"] = 0;
// Affichage 
include "templates/pages/page_form_connexion.php";

