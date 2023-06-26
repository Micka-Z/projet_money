<?php

/*

class promesse : Gestion des accès à la table `PROMESSE`

*/

class promesse {

    // Attributs
    protected $utilisateur = 0; // L'id' de l'utilisateur qui réalise la promesse de financement
    protected $projet = 0; // L'id du projet financé
    protected $montant_promis = ""; // Le montant promis
    protected $id = 0; // Valeurs de l'id


    // Méthodes

    // GETTERS
    // Rôle : récupérer les attributs
    // Retour : la valeur
    // Paramètres : néant

    function getUtilisateur() {
        return $this->utilisateur;
    }

    function getProjet() {
        return $this->projet;
    }

    function getMontantpromis() {
        return $this->montant_promis;
    }

    function id() {
        return $this->id;
    }

    
    // SETTERS
    // Rôle : Mettre à jour la valeur de l'attribut
    // Retour : true si c'est bon, false sinon
    // Paramètres : 
    //      $valeur : la valeur

    function setUtilisateur($valeur) {
        $this->utilisateur = $valeur;
    }

    function setProjet($valeur) {
        $this->projet = $valeur;
    }

    function setMontantpromis($valeur) {
        $this->montant_promis = $valeur;
    }

    function chargerInformationsPromesse($tabPromesse) {
        // Rôle : Charger les informations de la promesse depuis un tableau
        // Retour : néant
        // Paramètres :
        //      $tabPromesse : tableau d'informations d'une promesse

        // SI le paramètre `utilisateur` est défini
        if (isset($tabPromesse["utilisateur"])) {
            // ALORS on met à jour l'attribut utilisateur
            $this->utilisateur = $tabPromesse["utilisateur"];
        }

        // SI le paramètre `projet` est défini
        if (isset($tabPromesse["projet"])) {
            // ALORS on met à jour l'attribut projet
            $this->projet = $tabPromesse["projet"];
        }

        // SI le paramètre `montant_promis` est défini
        if (isset($tabPromesse["montant_promis"])) {
            // ALORS on met à jour l'attribut montant_promis
            $this->montant_promis = $tabPromesse["montant_promis"];
        }

    }

    function executerRequete($sql, $parametres = []) {
        // Rôle : prépare et exécute une requête sur la base de données
        // Retour : la requête exécutée, false sinon
        // Paramètres :
        //      $sql : le texte de la requête
        //      $param : le tableau des paramètres :xxx

        global $bdd;
        
        // Préparation de la requête
        $requete = $bdd->prepare($sql);

        // Exécution de la requête
        // SI l'exécution échoue
        if (!$requete->execute($parametres)) {
            echo "Echec de la requête";
            return false;
        }

        // SI la requête a été bien exécutée ALORS on la retourne
        return $requete;
    }

    function recupererUnePromesse($id) {
        // Rôle : Récupérer dans la base de données les informations d'une promesse dont l'id est donné
        // Retour : true si c'est bon, false sinon
        // Paramètres :
        //      $id : l'id de la promesse

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `utilisateur`, `projet`, `montant_promis`
                FROM `promesse`
                WHERE `id` = :id";
        
        // Tableau des paramètres
        $parametres = [
            ":id" => $id
        ];

        // Exécution de la requête et récupération du résultat
        $requete = $this->executerRequete($sql, $parametres);

        // SI la requête retourne false (donc la requête a échouée)
        if ($requete == false) {
            // ALORS on retourne false
            return false;
        }
        // Récupération des informations de la base de données
        $lignes = $requete->fetchAll(PDO::FETCH_ASSOC);

        // SI il n'y a rien à récupérer
        if (empty($lignes)) {
            // ALORS on retourne false
            return false;
        } else {
            // SINON on charge la promesse courante avec les informations récupérées, il n'y a qu'une seule ligne ici
            // Les informations se trouvent à la ligne 0
            $this->chargerInformationsPromesse($lignes[0]); 
                // On récupère l'id
            $this->id = $lignes[0]["id"];
            // On retourne true
            return true; 
        }

    }



    function insererPromesse() {
        // Rôle : insérer une promesse dans la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Construire la requête
        $sql = "INSERT INTO `promesse` SET `utilisateur` = :utilisateur, `projet` = :projet, `montant_promis` = :montant_promis";

        $parametres = [
            ":utilisateur" => $this->utilisateur,
            ":projet" => $this->projet,
            ":montant_promis" => $this->montant_promis
        ];

        // Exécution de la requête
        $requete = $this->executerRequete($sql, $parametres);

        // SI la requête échoue
        if ($requete == false) {
            // On met à jour l'id à 0
            $this->id = 0;
            // Et on retourne false
            return false;
        }

        // On récupère l'id du dernier enregistrement et on le met dans l'objet courant
        global $bdd;

        $this->id = $bdd->lastInsertId();

        return true;
    }

    function recupererPromessesUnProjet($idProjet) {
        // Rôle : Récupérer toutes les promesses d'un projet dont l'id est donné
        // Retour : La liste des promesses faites 
        // Paramètres :
        //      $idProjet : l'id du projet

        // Création de la requête de SELECTION
        $sql = "SELECT *
                FROM `promesse` 
                WHERE `promesse`.`projet` = :idProjet";
        
        // Exécution de la requête et récupération du résultat
        $requete = $this->executerRequete($sql, [":idProjet" => $idProjet]);

        // SI la requête retourne false (donc la requête a échouée)
        if ($requete == false) {
            // ALORS on retourne false
            return false;
        }
        // Récupération des informations de la base de données
        $lignes = $requete->fetchAll(PDO::FETCH_ASSOC);

        // SI il n'y a rien de récupérer
        if (empty($lignes)) {
            // ALORS on retourne NULL
            return null;
        } 

        // On crée la liste de retour
        $liste = [];

        // POUR CHAQUE promesse
        foreach ($lignes as $tabPromesse) {
            // On crée un objet
            $promesse = new promesse();

            // On charge l'objet
            $promesse->chargerInformationsPromesse($tabPromesse);

            // On enregistre l'id de la promesse
            $promesse->id = $tabPromesse["id"];

            // On enregistre dans le tableau de retour la promesse
            $liste[$tabPromesse["id"]] = $promesse;
        }

        // On retourne la liste
        return $liste;
    }

    function recupererPromessesUnUtilisateur($idUtilisateur) {
        // Rôle : Récupérer toutes les promesses d'un utilisateur dont l'id est donné
        // Retour : La liste des promesses faites 
        // Paramètres :
        //      $idUtilisateur : l'id de l'utilisateur

        // Création de la requête de SELECTION
        $sql = "SELECT *
                FROM `promesse` 
                WHERE `promesse`.`utilisateur` = :idUtilisateur";
        
        // Exécution de la requête et récupération du résultat
        $requete = $this->executerRequete($sql, [":idUtilisateur" => $idUtilisateur]);

        // SI la requête retourne false (donc la requête a échouée)
        if ($requete == false) {
            // ALORS on retourne false
            return false;
        }
        // Récupération des informations de la base de données
        $lignes = $requete->fetchAll(PDO::FETCH_ASSOC);

        // SI il n'y a rien à récupérer
        if (empty($lignes)) {
            // ALORS on retourne NULL
            return null;
        } 

        // On crée la liste de retour
        $liste = [];

        // POUR CHAQUE promesse
        foreach ($lignes as $tabPromesse) {
            // On crée un objet
            $promesse = new promesse();

            // On charge l'objet
            $promesse->chargerInformationsPromesse($tabPromesse);

            // On enregistre l'id de la promesse
            $promesse->id = $tabPromesse["id"];

            // On enregistre dans le tableau de retour la promesse
            $liste[$tabPromesse["id"]] = $promesse;
        }

        // On retourne la liste
        return $liste;
    }

    /*function recupererToutesLesPromesses() {
        // Rôle : Récupérer toutes les promesses depuis la BDD
        // Retour : La liste des promesse
        // Paramètres : néant

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `utilisateur`, `projet`, `montant_promis`
                FROM `promesse`";
        
        // Exécution de la requête et récupération du résultat
        $requete = $this->executerRequete($sql, []);

        // SI la requête retourne false (donc la requête a échouée)
        if ($requete == false) {
            // ALORS on retourne false
            return false;
        }
        // Récupération des informations de la base de données
        $lignes = $requete->fetchAll(PDO::FETCH_ASSOC);

        // SI il n'y a rien de récupérer
        if (empty($lignes)) {
            // ALORS on retourne NULL
            return null;
        } 

        // On crée la liste de retour
        $liste = [];

        // POUR CHAQUE promesse
        foreach ($lignes as $tabPromesse) {
            // On crée un objet
            $promesse = new promesse();

            // On charge l'objet
            $promesse->chargerInformationsPromesse($tabPromesse);

            // On enregistre l'id de la promesse
            $promesse->id = $tabPromesse["id"];

            // On enregistre dans le tableau de retour la promesse
            $liste[$tabPromesse["id"]] = $promesse;
        }

        // On retourne la liste
        return $liste;
    }*/

}