<?php

/*

Template de page : Mise en page de la page principale de l'application

Paramètres : néant

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?>
    <meta name="description" content="Page principale du financement participatif">
    <title>Page d'accueil</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>

    <div class="container mb-4">
        <main>
            <h1 class="display-5 fw-bold text-center text-uppercase">Money</h1>
            <h2 class="text-center display-6">Le site de financement participatif</h2>
            <?php if($success): ?>
                        <div class="alert alert-success my-4"><?= $success ?></div>
            <?php endif; ?>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>