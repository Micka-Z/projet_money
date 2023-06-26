<?php

/*

Template de page : Mise en page de la liste des projets en recherche de financement

Paramètres : 
    $listeProjetsAFinancer : la liste des projets en recherche de financement

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?>
    <meta name="description" content="La liste des projets en recherche de financement">
    <title>Liste des projets en recherche de financement</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>

    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Projets à financer</h1>
            <div class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <!-- Affichage du BLOC des messages d'erreur -->
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if(empty($listeProjetsAFinancer)): ?>
                        <div class="alert alert-primary my-4">Il n'y a pas de projets à financer</div>
                    <?php else: ?>
                        <!-- POUR CHAQUE projet restant à financer -->
                        <?php foreach($listeProjetsAFinancer as $unProjetAFinancer): ?>
                            <ul class="list-group my-4">
                                <!-- On calcule le montant total restant --> 
                                <?php 
                                    $compteur++;
                                    $montantTotal = htmlentities($unProjetAFinancer->getMontant()) - $tabTotal[$compteur-1];
                                    ?>
                                <li class="list-group-item list-group-item-action">Projet N°<?= $unProjetAFinancer->id() ?> : <?= htmlentities($unProjetAFinancer->getTitre()) ?></li>
                                <li class="list-group-item list-group-item-action">Reste à financer : <span class="text-danger fw-bold"><?= number_format($montantTotal, 0, ',', ' ') ?></span> €</li>
                                <li class="list-group-item"><a href="afficher_detail_projet.php?id=<?= $unProjetAFinancer->id() ?>" class="btn btn-primary btn-sm" title="Vers le projet" >Voir le projet</a></li>
                            </ul> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>