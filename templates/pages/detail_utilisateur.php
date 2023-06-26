<?php

/*

Template de page : Mise en page des informations d'un utilisateur en cas de modification

Paramètres : 
    $utilisateurAModifier : un objet utilisateur chargé

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?> 
    <meta name="description" content="Informations des utilisateurs">
    <title>Détail de l'utilisateur N° <?= $utilisateurAModifier->id() ?></title>
</head>
<body>
    <?php include "templates/fragments/header.php" ?>
    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Détail de l'utilisateur N° <?= $utilisateurAModifier->id() ?></h1>
            <div class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <!-- Affichage du BLOC des messages d'erreur -->
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <!-- Formulaire de saisie d'un utilisateur pré-rempli pour modification -->
                    <form action="modifier_utilisateur.php?id=<?= $utilisateurAModifier->id() ?>" method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Login</label>
                                <input type="text" class="form-control" name="login" maxlength="100" value="<?=  htmlentities($utilisateurAModifier->getLogin())  ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" maxlength="100" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" maxlength="100" value="<?=  htmlentities($utilisateurAModifier->getNom())  ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" maxlength="100" value="<?=  htmlentities($utilisateurAModifier->getEmail())  ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-select">
                                    <option value="" selected>Choisir un type d'utilisateur</option>
                                    <option value="gest">Gestionnaire</option>
                                    <option value="inve">Investisseur</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary my-4">Envoyer</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>