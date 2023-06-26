<?php

/*

Template de page : Mise en page de la liste des promesses effectuées

Paramètres : 
    $listePromessesEffectuees : la liste des promesses effectuées

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?>
    <meta name="description" content="Liste des promesses effectuées d'un projet">
    <title>Liste des promesses effectuées</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>

    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Promesses effectuées</h1>
            <div class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <!-- Affichage du BLOC des messages d'erreur -->
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if(empty($listePromessesEffectuees)): ?>
                        <div class="alert alert-primary my-4">Il n'y a pas de promesses de réaliser</div>
                    <?php else: ?>
                        <!-- Pour chaque promesse, on affiche son détail -->
                        <?php foreach($listePromessesEffectuees as $unePromesse): ?>
                            <ul class="list-group my-4">
                                <li class="list-group-item list-group-item-action">Promesse N°<?= $unePromesse->id() ?></li>
                                <li class="list-group-item list-group-item-action">Montant promis : <span class="text-success fw-semibold"><?= htmlentities(number_format($unePromesse->getMontantpromis(), 0, ',', ' ')) ?></span> €</li>
                                <li class="list-group-item">Projet N° <?= $unePromesse->getProjet() ?> : <a href="afficher_detail_projet.php?id=<?= $unePromesse->getProjet() ?>" class="btn btn-primary btn-sm" title="Vers le détail du projet" >Voir le projet</a></li>
                            </ul> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>