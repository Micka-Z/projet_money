<?php

/*

Template de page : Mise en page de la liste des utilisateurs

Paramètres : 
    $listeUtilisateurs : la liste des utilisateurs

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?>
    <meta name="description" content="Liste des membres pouvant utiliser l'application">
    <title>Page d'accueil</title>
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
                    <h2 class="h3 fst-italic">Liste des utilisateurs :</h2>
                    <?php if(empty($listeUtilisateurs)): ?>
                        <div class="alert alert-primary my-4">Il n'y a pas d'utilisateurs</div>
                    <?php else: ?>
                        <ul class="list-group my-4">
                            <?php foreach($listeUtilisateurs as $unUtilisateur): ?>
                                <li class="list-group-item">
                                    Utilisateur N°<?= $unUtilisateur->id() ?> : <span class="fw-semibold"><?= htmlentities($unUtilisateur->getNom()) ?></span>     
                                </li>
                                <li class="list-group-item">
                                    Type : <span class="fw-semibold"><?= $unUtilisateur->getType() ?></span>
                                </li>
                                <li class="list-group-item mb-4">
                                    <a href="afficher_modifier_utilisateur.php?id=<?= $unUtilisateur->id() ?>" class="btn btn-warning btn-sm">Modifier</a>
                                    <?php if($unUtilisateur->getType() != "DESA"): ?>
                                        <a href="desactiver_utilisateur.php?id=<?= $unUtilisateur->id() ?>" class="btn btn-danger btn-sm">Désactiver</a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul> 
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>