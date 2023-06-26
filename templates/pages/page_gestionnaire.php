<?php

/*

Template de page : Mise en page de la fenêtre principale pour les gestionnaires de l'application

Paramètres : 
    $listeProjetsEnAttente : la liste des projets en attente de validation

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?> 
    <meta name="description" content="Les membres gestionnaire">
    <title>Gestionnaire</title>
</head>
<body>
    <?php include "templates/fragments/header.php" ?>
    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Gestionnaire</h1>
            <div class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <h2 class="h3 fst-italic">Liste des projets en attente de validation :</h2>
                    <?php if(empty($listeProjetsEnAttente)): ?>
                        <div class="alert alert-primary my-4">Il n'y a pas de projets en attente</div>
                    <?php else: ?>
                        <ul class="list-group my-4">
                            <?php foreach($listeProjetsEnAttente as $unProjet): ?>
                                <li class="list-group-item list-group-item-action">Projet N°<?= $unProjet->id() ?> : <a href="afficher_detail_projet.php?id=<?= $unProjet->id() ?>" title="Vers le détail d'un projet" ><?= htmlentities($unProjet->getTitre()) ?></a></li>
                            <?php endforeach; ?>
                        </ul>  
                    <?php endif; ?> 
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>