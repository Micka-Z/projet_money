<?php

/*

Fragment de page : Mise en page de l'en-tête de navigation (header)

Paramètres : néant

*/

?>

<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <!-- LOGO -->
        <a href="index.php" class="d-flex align-items-center me-4 mb-2 mb-lg-0 text-white text-decoration-none" title="Page d'accueil du site de financement participatif MONEY">
            <img src="img/logo-money.png" alt="Logo du site MONEY" width="48" height="48" class="rounded">
        </a>
        <!-- MENU de navigation -->
        <ul class="nav col-12 col-lg-auto me-lg-auto ms-4 mb-2 justify-content-center mb-md-0">
          <li>
            <a href="index.php" class="nav-link px-2 text-secondary" title="Page d'accueil du site de financement participatif MONEY">Home</a>
          </li>
          <!--
            S'il y a un utilisateur de connecté, alors on affiche le menu en fonction du type d'utilisateur
          -->
          <?php if(!empty($_SESSION["id"]) && $_SESSION["id"] != 0): ?>
              <?php if($utilisateur->getType() == "GEST"): ?>
                <li><a href="afficher_liste_utilisateurs.php" title="Liste des utilisateurs" class="nav-link px-2 text-white">Liste des utilisateurs</a></li>
                <li><a href="afficher_form_utilisateur.php" title="Formulaire de saisie d'un nouvel utilisateur" class="nav-link px-2 text-white">Nouvel utilisateur</a></li>
                <li><a href="afficher_liste_projets.php" title="Liste des projets acceptés" class="nav-link px-2 text-white">Projets acceptés</a></li>
                <li><a href="afficher_liste_projets_finances.php" title="Liste des projets financés" class="nav-link px-2 text-white">Projets financés</a></li>

            </ul>
            <div class="text-end">
              <a href="afficher_page_gestionnaire.php" title="Page principale des membres gestionnaire" class="btn btn-outline-light me-2">Page principale</a>
              <a href="afficher_form_connexion.php" title="Page du formulaire de connexion" class="btn btn-outline-light me-2">Se déconnecter</a>
            </div>
            <?php elseif($utilisateur->getType() == "INVE"): ?>
                <li><a href="afficher_liste_projets_recherches.php" title="Liste des projets en rechecher de financement" class="nav-link px-2 text-white">Projets en recherche de financement</a></li>
                <li><a href="afficher_liste_projets_finances.php" title="Liste des projets financés" class="nav-link px-2 text-white">Projets financés</a></li>
                <li><a href="afficher_liste_promesses_effectuees.php" title="Liste des promesses effectuées" class="nav-link px-2 text-white">Promesses de financement effectuées</a></li>
            </ul>
            <div class="text-end">
              <a href="afficher_page_investisseur.php" title="Page principale des membres investisseur" class="btn btn-outline-light me-2">Page principale</a>
              <a href="afficher_form_connexion.php" title="Page du formulaire de connexion" class="btn btn-outline-light me-2">Se déconnecter</a>
            </div>
          <?php endif; ?>
          <?php else: ?>
              <li><a href="afficher_form_projet.php" title="Formulaire de saisie d'un nouveau projet" class="nav-link px-2 text-white">Déposer un projet</a></li>
          </ul>
          <div class="text-end">
              <a href="afficher_form_connexion.php" title="Page du formulaire de connexion" class="btn btn-outline-light me-2">Se connecter</a>
          </div>
      <?php endif; ?>
      </div>
    </div>
</header>