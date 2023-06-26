<?php 


/*

Controleur : affichage du détail d'un projet

Paramètres : 
    GET id : l'id du projet
    GET cle : la clé du projet

*/

// Initialisation
include "library/init.php";
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


include "templates/fragments/detail_financement.php";

?>