<?php
/*

Controleur : Insertion dans la base de données d'un nouveau projet

Paramètres : 
    POST $titre : le titre du projet
    POST $description : la description du projet
    POST $montant : le montant du projet
    POST $nom : le nom du proteur du projet
    POST $prenom : le prenom du proteur du projet
    POST $adresse : l'adresse du proteur du projet
    POST $code_postal : le code postal du proteur du projet
    POST $ville : la ville du proteur du projet
    POST $tel : le téléphone du proteur du projet
    POST $email : l'email du proteur du projet

*/

// Initialisations
include "library/init.php";

// Déclaration des variables
$error = null;
$success = null;
// Récupération des paramètres
$titre = $_POST["titre"];
$description = $_POST["description"];
$montant = $_POST["montant"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$adresse = $_POST["adresse"];
$code_postal = $_POST["code_postal"];
$ville = $_POST["ville"];
$tel = $_POST["tel"];
$email = $_POST["email"];

// SI un paramètre n'a pas été saisie par l'utilisateur
if (empty($titre) || empty($description) || empty($montant) || empty($nom) || empty($prenom) || empty($adresse) || empty($code_postal) || empty($ville) || empty($tel) || empty($email)) {
    // ALORS on affiche un message d'erreur 
    $error = "Erreur de saisie, vérifier toutes les informations";
    // On affiche le formulaire de saisie
    include "templates/pages/page_form_projet.php";
    exit;
} else {
    // Création d'un objet projet
    $projet = new projet();
    // On charge l'objet avec les valeurs récupérées du formulaire
    $projet->setTitre($titre);
    $projet->setDescription($description);
    $projet->setMontant($montant);
    $projet->setNom($nom);
    $projet->setPrenom($prenom);
    $projet->setAdresse($adresse);
    $projet->setCodepostal($code_postal);
    $projet->setVille($ville);
    $projet->setTel($tel);
    $projet->setEmail($email);
    $projet->setDatecreation(date("Y-m-d"));
    $projet->setStatut("ATT");
    $projet->setMotif("");
    // On insère dans la base de données le nouveau projet
    $projet->insererProjet();
    // On affiche un message indiquant la bonne déposition du projet
    $success = "Votre projet a bien été déposé. \n 
                Vous recevrez prochainement un email indiquant si votre projet a été retenu.";
}

// On affiche la page principale
include "templates/pages/page_principale.php";