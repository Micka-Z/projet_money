<?php

/*

Template de page : Mise en page de la liste des projets validés

Paramètres : 
    $listeProjetsValides : la liste des projets validés (type = "VAL")

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?>
    <meta name="description" content="Liste des projets validés">
    <title>Page d'accueil</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>

    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Gestionnaire</h1>
            <div class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <!-- Affichage du BLOC des messages d'erreur -->
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <h2 class="h3 fst-italic">Liste des projets validés :</h2>
                    <?php if(empty($listeProjetsValides)): ?>
                        <div class="alert alert-primary my-4">Il n'y a pas de projets validés</div>
                    <?php else: ?>
                        <ul class="list-group my-4">
                            <!-- pour chaque projet validé, on affiche un lien -->
                            <?php foreach($listeProjetsValides as $unProjet): ?>
                                <li class="list-group-item list-group-item-action">Projet N°<?= $unProjet->id() ?> : <a href="afficher_detail_projet.php?id=<?= $unProjet->id() ?>" title="Vers le détail du projet" ><?= htmlentities($unProjet->getTitre()) ?></a></li>
                            <?php endforeach; ?>
                        </ul> 
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>