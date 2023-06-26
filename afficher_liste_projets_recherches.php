<?php
/*

Controleur : affichage de la page de la liste des projets en recherche de financement

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

// On crée la liste des projets à financer
$listeProjetsAFinancer = [];
$tabTotal = [];
$projet = new projet();
// On récupère d'abord la liste des projets validés
$listeProjetsValides = $projet->recupererTousLesProjetsFiltres("VAL");
// Pour chaque projet validé
foreach($listeProjetsValides as $unProjet) {
    $total = 0;
    $promesse = new promesse();
    // On récupère la liste des promesses
    $listePromesses = $promesse->recupererPromessesUnProjet($unProjet->id());
    // On récupère le montant total promis
    if(isset($listePromesses)) {
        foreach($listePromesses as $unePromesse) {
            $total += $unePromesse->getMontantpromis();
        }
        // On crée la liste des projets si le montant total des promesses reste inférieur, on fournit pour l'affichage le total
        if($total < $unProjet->getMontant()) {
            $listeProjetsAFinancer[$unProjet->id()] = $unProjet;
            $tabTotal[] = $total;
        }
    } else {
        // Le montant total restera à 0
        $listeProjetsAFinancer[$unProjet->id()] = $unProjet;
        $tabTotal[] = 0;
    }

}

$compteur = 0;


// Affichage 
include "templates/pages/page_liste_projets_recherches.php";