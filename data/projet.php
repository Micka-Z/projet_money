<?php

/*

class projet : Gestion des accès à la table `PROJET`

*/

class projet {

    // Attributs
    protected $titre = ""; // Le titre du projet
    protected $description = ""; // La description du projet
    protected $montant = "0.00"; // Le montant du projet
    protected $nom = ""; // Le nom du porteur du projet
    protected $prenom = ""; // Le prénom du porteur du projet
    protected $adresse = ""; // L'adresse du porteur du projet
    protected $code_postal = ""; // Le code postal du porteur du projet
    protected $ville = ""; // La ville du porteur du projet
    protected $tel = ""; // Le numéro de téléphone du porteur du projet
    protected $email = ""; // L'adresse email du porteur du projet
    protected $date_creation = ""; // La date de création du projet sur la plateforme
    protected $statut = ""; // Le statut du projet sur la plateforme - ATT : "en attente" / VAL : "validé" / REF : "refusé"
    protected $motif = ""; // Le motif à saisir en cas de refus du projet
    protected $cle = ""; // La clé secrète pour accéder au projet
    protected $id = 0; // Valeurs de l'id


    // Méthodes

    // GETTERS
    // Rôle : récupérer les attributs
    // Retour : la valeur
    // Paramètres : néant

    function getTitre() {
        return $this->titre;
    }

    function getDescription() {
        return $this->description;
    }

    function getMontant() {
        return $this->montant;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getCodepostal() {
        return $this->code_postal;
    }

    function getVille() {
        return $this->ville;
    }

    function getTel() {
        return $this->tel;
    }

    function getEmail() {
        return $this->email;
    }

    function getDatecreation() {
        return $this->date_creation;
    }

    function getStatut() {
        return $this->statut;
    }

    function getMotif() {
        return $this->motif;
    }

    function getCle() {
        return $this->cle;
    }

    function id() {
        return $this->id;
    }

    
    // SETTERS
    // Rôle : Mettre à jour la valeur de l'attribut
    // Retour : true si c'est bon, false sinon
    // Paramètres : 
    //      $valeur : la valeur

    function setTitre($valeur) {
        $this->titre = $valeur;
    }

    function setDescription($valeur) {
        $this->description = $valeur;
    }

    function setMontant($valeur) {
        $this->montant = $valeur;
    }

    function setNom($valeur) {
        $this->nom = $valeur;
    }

    function setPrenom($valeur) {
        $this->prenom = $valeur;
    }

    function setAdresse($valeur) {
        $this->adresse = $valeur;
    }

    function setCodepostal($valeur) {
        $this->code_postal = $valeur;
    }

    function setVille($valeur) {
        $this->ville = $valeur;
    }

    function setTel($valeur) {
        $this->tel = $valeur;
    }

    function setEmail($valeur) {
        $this->email = $valeur;
    }

    function setDatecreation($valeur) {
        $this->date_creation = $valeur;
    }

    function setStatut($valeur) {
        $this->statut = $valeur;
    }

    function setMotif($valeur) {
        $this->motif = $valeur;
    }

    function setCle($valeur) {
        $this->cle = $valeur;
    }

    function chargerInformationsProjet($tabProjet) {
        // Rôle : Charger les informations d'un projet' depuis un tableau
        // Retour : néant
        // Paramètres :
        //      $tabProjet : tableau d'informations d'un projet

        // SI le paramètre `titre` est défini
        if (isset($tabProjet["titre"])) {
            // ALORS on met à jour l'attribut titre
            $this->titre = $tabProjet["titre"];
        }

        // SI le paramètre `description` est défini
        if (isset($tabProjet["description"])) {
            // ALORS on met à jour l'attribut description
            $this->description = $tabProjet["description"];
        }

        // SI le paramètre `montant` est défini
        if (isset($tabProjet["montant"])) {
            // ALORS on met à jour l'attribut montant
            $this->montant = $tabProjet["montant"];
        }

        // SI le paramètre `nom` est défini
        if (isset($tabProjet["nom"])) {
            // ALORS on met à jour l'attribut nom
            $this->nom = $tabProjet["nom"];            
        }

        // SI le paramètre `prenom` est défini
        if (isset($tabProjet["prenom"])) {
            // ALORS on met à jour l'attribut prenom
            $this->prenom = $tabProjet["prenom"];
        }

        // SI le paramètre `adresse` est défini
        if (isset($tabProjet["adresse"])) {
            // ALORS on met à jour l'attribut adresse
            $this->adresse = $tabProjet["adresse"];
        }

        // SI le paramètre `code_postal` est défini
        if (isset($tabProjet["code_postal"])) {
            // ALORS on met à jour l'attribut code_postal
            $this->code_postal = $tabProjet["code_postal"];
        }

        // SI le paramètre `ville` est défini
        if (isset($tabProjet["ville"])) {
            // ALORS on met à jour l'attribut ville
            $this->ville = $tabProjet["ville"];
        }

        // SI le paramètre `tel` est défini
        if (isset($tabProjet["tel"])) {
            // ALORS on met à jour l'attribut tel
            $this->tel = $tabProjet["tel"];
        }

        // SI le paramètre `email` est défini
        if (isset($tabProjet["email"])) {
            // ALORS on met à jour l'attribut email
            $this->email = $tabProjet["email"];
        }

        // SI le paramètre `date_creation` est défini
        if (isset($tabProjet["date_creation"])) {
            // ALORS on met à jour l'attribut date_creation
            $this->date_creation = $tabProjet["date_creation"];
        }

        // SI le paramètre `statut` est défini
        if (isset($tabProjet["statut"])) {
            // ALORS on met à jour l'attribut statut
            $this->statut = $tabProjet["statut"];
        }

        // SI le paramètre `motif` est défini
        if (isset($tabProjet["motif"])) {
            // ALORS on met à jour l'attribut motif
            $this->motif = $tabProjet["motif"];
        }

        // SI le paramètre `cle` est défini
        if (isset($tabProjet["cle"])) {
            // ALORS on met à jour l'attribut cle
            $this->cle = $tabProjet["cle"];
        }
    }

    function executerRequete($sql, $parametres = []) {
        // Rôle : prépare et exécute une requête sur la base de données
        // Retour : true la requête exécutée, false sinon
        // Paramètres :
        //      $sql : le texte de la requête
        //      $param : le tableau des paramètres :xxx

        global $bdd;
        
        // Préparation de la requête
        $requete = $bdd->prepare($sql);

        // Exécution de la requête
        // SI l'exécution échoue
        if (!$requete->execute($parametres)) {
            // ALORS on diffuse un message d'erreur
            echo "Echec de la requête";
            // Et on retourne false
            return false;
        }

        // La requête a été bien exécutée, on la retourne
        return $requete;
    }

    function recupererUnProjet($id) {
        // Rôle : Récupérer dans la base de données les informations d'un projet dont l'id est donné
        // Retour : true si c'est bon, false sinon
        // Paramètres :
        //      $id : l'id du projet

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `titre`, `description`, `montant`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `tel`, `email`, `date_creation`, `statut`, `motif`, `cle`
                FROM `projet`
                WHERE `id` = :id";
        
        // Définition des paramètres dans un tableau
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
            // SINON on charge le projet courant avec les informations récupérées
            // Les informations se trouvent à la ligne 0
            $this->chargerInformationsProjet($lignes[0]); 
                // On récupère l'id
            $this->id = $lignes[0]["id"];
            // On retourne true
            return true; 
        }

    }

    function recupererUnProjetParLaCle($cle) {
        // Rôle : Récupérer dans la base de données les informations d'un projet dont la clé est donnée
        // Retour : true si c'est bon, false sinon
        // Paramètres :
        //      $cle : la clé du projet

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `titre`, `description`, `montant`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `tel`, `email`, `date_creation`, `statut`, `motif`, `cle`
                FROM `projet`
                WHERE `cle` = :cle";
        
        $parametres = [
            ":cle" => $cle
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
            // SINON on charge le projet courant avec les informations récupérées
            // Les informations se trouvent à la ligne 0
            $this->chargerInformationsProjet($lignes[0]); 
                // On récupère l'id
            $this->id = $lignes[0]["id"];
            // On retourne true
            return true; 
        }        
    }

    function recupererTousLesProjetsFiltres($valeur) {
        // Rôle : Récupérer tous les projets en fonction de son statut depuis la base de données
        // Retour : La liste des projets filtrés
        // Paramètres :
        //  $valeur : la valeur du filtre ("ATT", "VAL", "REF", "FINA")

        // Création de la requête de SELECTION
        $sql = "SELECT `id`, `titre`, `description`, `montant`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `tel`, `email`, `date_creation`, `statut`, `motif`, `cle`
                FROM `projet`
                WHERE `statut` = :valeur
                ORDER BY `date_creation` DESC";
    
        // Liste des paramètres
        $parametres = [
            ":valeur" => $valeur
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

        // SI il n'y a rien de récupérer
        if (empty($lignes)) {
            // ALORS on retourne NULL
            return null;
        } 

        // On crée la liste de retour
        $liste = [];

        // POUR CHAQUE projet
        foreach ($lignes as $tabProjet) {
            // On crée un objet
            $projet = new projet();

            // On charge l'objet
            $projet->chargerInformationsProjet($tabProjet);

            // On enregistre l'id du projet
            $projet->id = $tabProjet["id"];

            // On enregistre dans le tableau de retour le projet
            $liste[$tabProjet["id"]] = $projet;
        }

        // On retourne la liste
        return $liste;
    }

    

    function insererProjet() {
        // Rôle : insérer un projet dans la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Construire la requête
        $sql = "INSERT INTO `projet` 
                SET `titre` = :titre, `description` = :description, `montant` = :montant, `nom` = :nom, `prenom` = :prenom, `adresse` = :adresse, `code_postal` = :code_postal, `ville` = :ville, `tel` = :tel, `email` = :email, `date_creation` = :date_creation, `statut` = :statut, `motif` = :motif, `cle` = :cle";

        // Tableau des paramètres
        $parametres = [
            ":titre" => $this->titre,
            ":description" => $this->description,
            ":montant" => $this->montant,
            ":nom" => $this->nom,
            ":prenom" => $this->prenom,
            ":adresse" => $this->adresse,
            ":code_postal" => $this->code_postal,
            ":ville" => $this->ville,
            ":tel" => $this->tel,
            ":email" => $this->email,
            ":date_creation" => $this->date_creation,
            ":statut" => $this->statut,
            ":motif" => $this->motif,
            ":cle" => $this->cle
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

    function modifierProjet() {
        // Rôle : mettre à jour le projet courant dans la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Construire la requête
        $sql = "UPDATE `projet` 
                SET `titre` = :titre, `description` = :description, `montant` = :montant, `nom` = :nom, `prenom` = :prenom, `adresse` = :adresse, `code_postal` = :code_postal, `ville` = :ville, `tel` = :tel, `email` = :email, `statut` = :statut, `motif` = :motif, `cle` = :cle
                WHERE `id` = :id";

        // Tableau des paramètres
        $parametres = [
            ":titre" => $this->titre,
            ":description" => $this->description,
            ":montant" => $this->montant,
            ":nom" => $this->nom,
            ":prenom" => $this->prenom,
            ":adresse" => $this->adresse,
            ":code_postal" => $this->code_postal,
            ":ville" => $this->ville,
            ":tel" => $this->tel,
            ":email" => $this->email,
            ":statut" => $this->statut,
            ":motif" => $this->motif,
            ":cle" => $this->cle,
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
        // TOut est bon, on retourne true
        return true;
    }

    /*function supprimerProjet() {
        // Rôle : supprimer le projet courant de la base de données
        // Retour : true si c'est bon, false sinon
        // Paramètres : néant

        // Création de la requête
        $sql = "DELETE FROM `projet` WHERE `id` = :id";

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