<?php

/*

Template de page : Mise en page de la liste des projets financés

Paramètres : 
    $listeProjetsFinances : la liste des projets en recherche de financement

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?>
    <meta name="description" content="Le détail de chaque projet financé">
    <title>Liste des projets financés</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>

    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Projets financés</h1>
            <?php if($utilisateur->getType() == "GEST"): ?>
                <div class="alert alert-success">
                    Contacter les porteurs de projets et les investisseurs
                </div>
            <?php endif; ?>
            <div class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <!-- Affichage du BLOC des messages d'erreur -->
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if(empty($listeProjetsFinances)): ?>
                        <div class="alert alert-primary my-4">Il n'y a pas de projets financés</div>
                    <?php else: ?>
                        <!-- Affichage de chaque projet financé -->
                        <?php foreach($listeProjetsFinances as $unProjetFinance): ?>
                            <ul class="list-group my-4">
                                <li class="list-group-item list-group-item-action">Projet N°<?= $unProjetFinance->id() ?> : <?= htmlentities($unProjetFinance->getTitre()) ?></li>
                                <li class="list-group-item"><a href="afficher_detail_projet.php?id=<?= $unProjetFinance->id() ?>" class="btn btn-primary btn-sm" title="Vers le détail du projet" >Voir le projet</a></li>
                            </ul> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>