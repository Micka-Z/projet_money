<?php

/*

Template de page : Mise en page des informations d'un projet

Paramètres : 
    $projet : un objet projet chargé
    $utilisateur : un objet utilisateur chargé
    $listeInvestisseurs : la liste des investisseurs d'un pojet donné

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?> 
    <meta name="description" content="Description détaillée du projet">
    <title>Détail du projet N° <?= $projet->id() ?></title>
</head>
<body>
    <?php include "templates/fragments/header.php" ?>
    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Détail du projet N° <?= $projet->id() ?></h1>
            <div class="row g-5">
                <!-- Affichage du BLOC des messages d'erreur -->
                <div class="col-md-4 col-lg-6">
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <!-- Informations principales du projet -->
                    <ul class="list-group my-4">
                        <li class="list-group-item list-group-item-action"><span class="fw-semibold">Titre </span>: <?= $projet->getTitre() ?></li>
                        <li class="list-group-item list-group-item-action"><span class="fw-semibold">Description :</span> <?= $projet->getDescription() ?></li>
                        <li class="list-group-item list-group-item-action"><span class="fw-semibold">Montant total :</span> <span class="text-success fw-semibold"><?= number_format($projet->getMontant(), 0, ',', ' ') ?></span> €</li>
                    </ul>
                </div>
            </div>
            <!-- Seuls les investisseurs peuvent proposer un montant de financement -->
            <?php if(!empty($utilisateur) && $utilisateur->getType() == "INVE" && $reste > 0): ?>
            <div class="row g-5">
                    <div class="col-md-4 col-lg-6">
                        <form action="proposer_montant.php?id=<?= $projet->id() ?>" method="post">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Proposer un montant</label>
                                    <input type="number" class="form-control" name="montant_propose" min="0" step="1">
                                </div>
                                <div class="d-flex mb-4">
                                    <button class="btn btn-primary btn-sm">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Les coodonnées du porteur du projet ne sont visibles que par les membres gestionnaire -->
            <?php if($utiType != "INVE"): ?>
                <div class="row g-5">         
                    <div class="col-md-4 col-lg-6">
                        <h2 class="h4 fst-italic">Coordonnées du porteur du projet: </h2>
                        <ul class="list-group my-4">
                            <li class="list-group-item list-group-item-action"><span class="fw-semibold">Nom :</span> <?= $projet->getNom() ?></li>
                            <li class="list-group-item list-group-item-action"><span class="fw-semibold">Prénom :</span> <?= $projet->getPrenom() ?></li>
                            <li class="list-group-item list-group-item-action"><span class="fw-semibold">Téléphone :</span> <?= $projet->getTel() ?></li>
                            <li class="list-group-item list-group-item-action"><span class="fw-semibold">Email :</span> <?= $projet->getEmail() ?></li>
                            <li class="list-group-item list-group-item-action"><span class="fw-semibold">Adresse :</span> <?= $projet->getAdresse() ?></li>
                            <li class="list-group-item list-group-item-action"><span class="fw-semibold">Code postal :</span> <?= $projet->getCodepostal() ?></li>
                            <li class="list-group-item list-group-item-action"><span class="fw-semibold">Ville :</span> <?= $projet->getVille() ?></li>
                        </ul> 
                        <!-- Boutons de validation ou de refus uniquement pour les nouveaux projets, à traiter par les gestionnaires -->
                        <?php if($projet->getStatut() == "ATT"): ?>
                            <div class="d-flex gap-2 justify-content-center py-4">
                                <button id="btn-valide" class="btn btn-success d-inline-flex align-items-center">Accepter</button>
                                <button id="btn-refuse" class="btn btn-danger d-inline-flex align-items-center">Refuser</button>
                            </div> 
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Affichage de la liste des investisseurs avec leurs coordonnées pour les gestionnaires, lorsque le projet est financé -->
                <?php if(!empty($utilisateur) && $projet->getStatut() == "FIN"): ?>
                    <div class="row g-5">
                        <div class="col-md-4 col-lg-6">
                            <h2 class="h4 fst-italic">Liste des investisseurs: </h2>
                            <?php foreach($listeInvestisseurs as $unInvestisseur): ?>  
                                <ul class="list-group my-4">
                                    <li class="list-group-item list-group-item-action"><span class="fw-semibold">Nom :</span> <?= $unInvestisseur->getNom() ?></li>
                                    <li class="list-group-item list-group-item-action"><span class="fw-semibold">Email :</span> <?= $unInvestisseur->getEmail() ?></li>
                                </ul> 
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <!-- BLOC du niveau de FINANCEMENT -->
            <?php if($projet->getStatut() != "ATT"): ?>
                <div id="div-cache"><?= $projet->id() ?></div>
                <div id="bloc-financement" class="row g-5">
                </div>
            <?php endif; ?>
            <!-- BLOC pour saisir le motif de refus -->
            <div id="div-refuse" class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <h3 class="h3 text-uppercase my-4 text-center">Refus</h3>
                    <div class="form-signin w-100 m-auto my-4">
                        <form action="action_projet.php?id=<?= $projet->id() ?>" method="post">
                            <div class="col-12">
                                <label class="form-label">Motif du refus</label>
                                <textarea name="motif" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary my-2" type="submit">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- BLOC pour modifier la description du projet en cas d'acceptation -->
            <div id="div-valide" class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <h3 class="h3 text-uppercase my-4 text-center">Accepté</h3>
                    <div class="form-signin w-100 m-auto my-4">
                        <form action="action_projet.php?id=<?= $projet->id() ?>" method="post">
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" cols="30" rows="5" class="form-control" required><?= htmlentities($projet->getDescription()) ?></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary my-2" type="submit">Valider</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="js/reload.js"></script>