<?php

/*

Template de page : Mise en page du formulaire de création d'un utilisateur

Paramètres : 
    $login, $nom, $email : informations d'un utilisateur si chargé

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?> 
    <meta name="description" content="Formulaire de saisie d'un nouvel utilisateur">
    <title>Nouvel utilisateur</title>
</head>
<body>
    <?php include "templates/fragments/header.php" ?>
    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Nouvel utilisateur</h1>
            <div class="row g-5">
                <div class="col-md-4 col-lg-6">
                    <!-- Affichage du BLOC des messages d'erreur -->
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <form action="enregistrer_utilisateur.php" method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Login</label>
                                <input type="text" class="form-control" name="login" maxlength="100" value="<?php echo (isset($login)) ? htmlentities($login) : ''; ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" maxlength="100" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" maxlength="100" value="<?php echo (isset($nom)) ? htmlentities($nom) : ''; ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" maxlength="100" value="<?php echo (isset($email)) ? htmlentities($email) : ''; ?>" required>
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