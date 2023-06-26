<?php

/*

Template de page : Mise en page du formulaire de connexion

Paramètres : néant

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?> 
    <meta name="description" content="Formulaire de connaxion">
    <title>Formulaire de connexion</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>

    <div class="container my-4">
        <main>
            <h1 class="h1 fw-bold text-center text-uppercase">Formulaire de connexion</h1>
            <div class="form-signin w-100 m-auto my-4">
                <!-- Affichage du BLOC des messages d'erreur -->
                <?php if($error): ?>
                    <div class="alert alert-danger my-4"><?= $error ?></div>
                <?php endif; ?>
                <form action="connecter.php" method="post">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="login">
                        <label>Login : </label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password">
                        <label>Mot de passe : </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary">Envoyer</button>
                </form>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>