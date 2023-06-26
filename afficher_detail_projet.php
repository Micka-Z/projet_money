<?php

/*

Controleur : affichage du détail d'un projet

Paramètres : 
    GET id : l'id du projet
    GET cle : la clé du projet

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres : 

// Déclaration des variables
$error = null;
$success = null;
$utiType = "";

// SI la session est vide (pas d'utilisateur connecté)
if(empty($_SESSION["id"])) {
        // SI on a reçu une clé, pour le cas du porteu de projet non connecté
    if(!empty($_GET["cle"])) {
        // ALORS on récupère la clé
        $cle = $_GET["cle"];
        // On charge le projet en fonction de sa clé
        $projet = new projet();
        $projet->recupererUnProjetParLaCle($cle);
        // On récupère les promesses effectuées pour ce projet
        $promesse = new promesse();
        $listePromesses = $promesse->recupererPromessesUnProjet($projet->id());
        $total = 0;
        $pourcentage = 0;
        $reste = 0;
        // On calcule le montant total pour chaque promesse, seulement si il y a une promesse reçue
        if(isset($listePromesses)) {
            foreach($listePromesses as $unePromesse) {
                $total += $unePromesse->getMontantpromis();
            }
        }
        // ON calcule le pourcentage restant à  financer
        $pourcentage = $total / $projet->getMontant() * 100;
        // Et on calcule le montant restant
        $reste = $projet->getMontant() - $total;
        // Affichage 
        include "templates/pages/detail_projet.php";
        exit();
    } else {
        include "templates/pages/page_form_connexion.php";
        exit();
    }
}

// Il y a un id, alors on cahrge l'utilisateur
$utilisateur = new utilisateur();
$utilisateur->recupererUnUtilisateur($_SESSION["id"]);
// Suite à un bug dans l'affichage du détail du projet, création d'une variable utiType
if($utilisateur->getType() == "INVE") {
    $utiType = "INVE";
}

// SI il n'y a pas d'id de projet
if (empty($_GET["id"])) {
    // ALORS on affiche un message d'erreur dans le template et on retourne à la page gestionnaire
    $error = "Erreur, il n'y a pas de projet";
    if($utilisateur->getType() == "GEST") {
        // Il faut donc la liste des projets en attente
        $projet = new projet();
        $listeProjetsEnAttente = $projet->recupererTousLesProjetsFiltres("ATT");
        include "templates/pages/page_gestionnaire.php";
        exit();
    } elseif($utilisateur->getType() == "INVE") {
        include "templates/pages/page_investisseur.php";
        exit();  
    }
}

// On a chargé le projet, on le charge
$idProjet = (int)$_GET["id"];
$projet = new projet();
$projet->recupererUnProjet($idProjet);
// ON charge sa liste des promesses  
$promesse = new promesse();
$listePromesses = $promesse->recupererPromessesUnProjet($idProjet);  
$total = 0;
$pourcentage = 0;
$reste = 0;
// On calcule les montants promis si les promesses existent
if(isset($listePromesses)) {
    foreach($listePromesses as $unePromesse) {
        $total += $unePromesse->getMontantpromis();
    }
}
// On calcule le pourcentage et le reste à financer
$pourcentage = $total / $projet->getMontant() * 100;
$reste = $projet->getMontant() - $total;

// On crée la liste des investisseurs pour l'affichage dans la partie des gestionnaires
$listeInvestisseurs = [];
if(isset($listePromesses)) {
    foreach($listePromesses as $unePromesseProjet) {
        $investisseur = new utilisateur();
        $investisseur->recupererUnUtilisateur($unePromesseProjet->getUtilisateur());
        $listeInvestisseurs[$investisseur->id()] = $investisseur;
    }
}

// Affichage 
include "templates/pages/detail_projet.php";

?>