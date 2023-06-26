<?php
/*

Controleur : Enregistrer la promesse de financement

Paramètres : 
    POST montant_propose
    GET id : l'id du projet

*/

// Initialisation
include "library/init.php";

// Récupération des paramètres :
$error = null;
$success = null;
$utiType = "";
// Si il n'y a pas d'utilisateur connecté
if(empty($_SESSION["id"])) {
    // ALORS on affiche le formulaire de connexion
    include "templates/pages/page_form_connexion.php";
    exit();
} else {
    // SINON on charge l'utilisateur
    $utilisateur = new utilisateur();
    $utilisateur->recupererUnUtilisateur($_SESSION["id"]);
    if($utilisateur->getType() == "INVE") {
        $utiType = "INVE";
    }
}
// ON récupère le montant
$montant_propose = $_POST["montant_propose"];
// SI il n'y a pas de montant saisi
if(empty($montant_propose)) {
    // ALORS on affiche un message d'erreur 
    $error = "Il y a une erreur de saisie du montant";
} elseif(empty($_GET["id"])) { // SINON SI il n'y pas d'id d'un projet de récupérer
    // ALORS on crée un message d'erreur
    $error = "Il n'y a pas de projet";
    // On affiche la page principale des investisseurs
    include "templates/pages/page_investisseur.php";
    exit();  
} else {
    // SINON on crée un nouvel objet promesse
    $promesse = new promesse();
    // On enregistre le montant
    $promesse->setMontantpromis($montant_propose);
    $idProjet = (int)$_GET["id"];
    // On enregistre le numéro du projet concerné
    $promesse->setProjet($idProjet);
    // On récupère l'investisseur qui a saisi
    $promesse->setUtilisateur($utilisateur->id());
    // On ajoute la promesse dans la base de données
    $promesse->insererPromesse();
}

// On a chargé le projet
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
// SI tout le projet est financé, on modifie son statut
if($reste <= 0) {
    $projet->setStatut("FIN");
    $projet->modifierProjet();
}

// Affichage 
include "templates/pages/detail_projet.php";
