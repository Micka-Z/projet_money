<?php

/* Initialisation générale des programmes

   Fichier à inclure en début de toutes les URL

*/

// Afficher les messages d'erreur PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Lancement de la session
session_start();
// Ajout des fichiers de fonctions
include_once("library/fonctions.php");
include_once("data/projet.php");
include_once("data/utilisateur.php");
include_once("data/promesse.php");

// On récupère la variable globale $bdd
global $bdd; 

// Connexion à la base de données et ouverture
$bdd = new PDO("mysql:host=localhost;dbname=dbname;charset=UTF8", "user", "password");
// En mise au point : pour afficher les erreurs que remonte la base d données
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);