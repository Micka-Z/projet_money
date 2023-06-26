<?php

/*

class utilisateur : Gestion des accès à la table `UTILISATEUR`

*/

class utilisateur {

    // Attributs
    protected $login = ""; // Le login de l'utilisateur
    protected $password = ""; // Le mot de passe de l'utilisateur
    protected $email = ""; // L'adresse email de l'utilisateur
    protected $nom = ""; // Le nom du porteur de l'utilisateur
    protected $type = ""; // Le type d'utilisateur
    protected $id = 0; // Valeurs de l'id


    // Méthodes

    // GETTERS
    // Rôle : récupérer les attributs
    // Retour : la valeur
    // Paramètres : néant

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getNom() {
        return $this->nom;
    }

    function getType() {
        return $this->type;
    }

    function id() {
        return $this->id;
    }

    
    // SETTERS
    // Rôle : Mettre à jour la valeur de l'attribut
    // Retour : true si c'est bon, false sinon
    // Paramètres : 
    //      $valeur : la valeur

    function setLogin($valeur) {
        $this->login = $valeur;
    }

    function setPassword($valeur) {
        $this->password = password_hash($valeur, PASSWORD_DEFAULT);
    }

    function setEmail($valeur) {
        $this->email = $valeur;
    }

    function setNom($valeur) {
        $this->nom = $valeur;
    }

    function setType($valeur) {
        $this->type = $valeur;
    }

    function chargerInformationsUtilisateur($tabUtilisateur) {
        // Rôle : Charger les informations de l'utilisateur depuis un tableau
        // Retour : néant
        // Paramètres :
        //      $tabUtilisateur : tableau d'informations d'un utilisateur

        // SI le paramètre `login` est défini
        if (isset($tabUtilisateur["login"])) {
            // ALORS on met à jour l'attribut login
            $this->login = $tabUtilisateur["login"];
        }

        // SI le paramètre `password` est défini
        if (isset($tabUtilisateur["password"])) {
            // ALORS on met à jour l'attribut password
            $this->password = $tabUtilisateur["password"];
        }

        // SI le paramètre `email` est défini
        if (isset($tabUtilisateur["email"])) {
            // ALORS on met à jour l'attribut email
            $this->email = $tabUtilisateur["email"];
        }

        // SI le paramètre `nom` est défini
        if (isset($tabUtilisateur["nom"])) {
            // ALORS on met à jour l'attribut nom
            $this->nom = $tabUtilisateur["nom"];            
        }

        // SI le paramètre `type` est défini
        if (isset($tabUtilisateur["type"])) {
            // ALORS on met à jour l'attribut type
            $this->type = $tabUtilisateur["type"];
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

    function recupererUnUtilisateur($id) {
        // Rôle : Récupérer dans la base de données les informations d'un utilisateur dont l'id est donné
        // Retour : true si c'est bon, false sinon
        // Paramètres :
        //      $id : l'id de l'utilisateur

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `login`, `password`, `email`, `nom`, `type`
                FROM `utilisateur`
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
            // SINON on charge l'utilisateur courant avec les informations récupérées
            // Les informations se trouvent à la ligne 0
            $this->chargerInformationsUtilisateur($lignes[0]); 
                // On récupère l'id
            $this->id = $lignes[0]["id"];
            // On retourne true
            return true; 
        }

    }

    function recupererUnUtilisateurParLogin($login) {
        // Rôle : Récupérer dans la base de données les informations d'un utilisateur dont le login est donné
        // Retour : true si c'est bon, false sinon
        // Paramètres :
        //      $login : le login de l'utilisateur

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `login`, `password`, `email`, `nom`, `type`
                FROM `utilisateur`
                WHERE `login` = :login";
        
        $parametres = [
            ":login" => $login
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
            // SINON on charge l'utilisateur courant avec les informations récupérées
            // Les informations se trouvent à la ligne 0
            $this->chargerInformationsUtilisateur($lignes[0]); 
            // On récupère l'id
            $this->id = $lignes[0]["id"];
            // On retourne true
            return true; 
        }

    }

    function recupererTousLesUtilisateurs() {
        // Rôle : Récupérer tous les utilisateurs depuis la BDD
        // Retour : La liste des utilisateurs
        // Paramètres : néant

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `login`, `password`, `email`, `nom`, `type`
                FROM `utilisateur`";
        
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

        // POUR CHAQUE utilisateur
        foreach ($lignes as $tabUtilisateur) {
            // On crée un objet
            $utilisateur = new utilisateur();

            // On charge l'objet
            $utilisateur->chargerInformationsUtilisateur($tabUtilisateur);

            // On enregistre l'id de l'utilisateur
            $utilisateur->id = $tabUtilisateur["id"];

            // On enregistre dans le tableau de retour l'utilisateur
            $liste[$tabUtilisateur["id"]] = $utilisateur;
        }

        // On retourne la liste
        return $liste;
    }

    function insererUtilisateur() {
        // Rôle : insérer un utilisateur dans la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Construire la requête
        $sql = "INSERT INTO `utilisateur` 
                SET `login` = :login, `password` = :password, `email` = :email, `nom` = :nom, `type` = :type";

        // Tableau des paramètres
        $parametres = [
            ":login" => $this->login,
            ":password" => $this->password,
            ":email" => $this->email,
            ":nom" => $this->nom,
            ":type" => $this->type
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

    function modifierUtilisateur() {
        // Rôle : mettre à jour l'utilisateur courant dans la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Construire la requête
        $sql = "UPDATE `utilisateur` 
                SET `login` = :login, `password` = :password, `email` = :email, `nom` = :nom, `type` = :type
                WHERE id = :id";

        // Tableau des paramètres
        $parametres = [
            ":login" => $this->login,
            ":password" => $this->password,
            ":email" => $this->email,
            ":nom" => $this->nom,
            ":type" => $this->type,
            ":id" => $this->id
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

        return true;
    }

    /*function supprimerUtilisateur() {
        // Rôle : supprimer l'utilisateur courant de la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Création de la requête
        $sql = "DELETE FROM `utilisateur` WHERE `id` = :id";

        $parametres = [
            ":id" => $this->id
        ];

        // Exécution de la requête et récupération du résultat
        $requete = $this->executerRequete($sql, $parametres);    
        // Si c'est bon 
        if ($requete != false) {
            // mettre l'id à 0
            $this->id = 0;
            // Et retourner true
            return true;
        } else {
            // SINON retourner false
            return false;
        }
    }*/


}