<?php

/*

Template de page : Mise en page du formulaire de saisie d'un nouveau projet

Paramètres : 
    $titre, $description, ... : les informmations d'un projet si elles sont chargées

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "templates/fragments/head.php" ?> 
    <meta name="description" content="Formulaire de saisie d'un projet">
    <title>Nouveau projet</title>
</head>
<body>
<?php include "templates/fragments/header.php" ?>

    <div class="container my-4">
        <main>
            <h1 class="h1 mb-4 fw-bold text-center text-uppercase">Nouveau projet</h1>
            <div class="row g-5 justify-content-center">
                <div class="col-md-4 col-lg-6">
                    <p class="text-center"><em>Pour une bonne prise en compte du projet, saisir toutes les informations demandées et décrire précisément le projet</em></p>
                    <!-- Affichage du BLOC des messages d'erreur -->
                    <?php if($error): ?>
                        <div class="alert alert-danger my-4"><?= $error ?></div>
                    <?php endif; ?>
                    <form action="enregistrer_projet.php" method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control" name="titre" maxlength="100" value="<?php echo (isset($titre)) ? htmlentities($titre) : ''; ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" cols="30" rows="5" class="form-control" required><?php echo (isset($description)) ? nl2br(htmlentities($description)) : ''; ?></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Montant</label>
                                <div class="input-group">
                                    <input type="number" name="montant" class="form-control" min="0" step="1" value="<?php echo (isset($montant)) ? htmlentities($montant) : ''; ?>" required>
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">@</span>
                                    <input type="email" name="email" class="form-control" maxlength="100" value="<?php echo (isset($email)) ? htmlentities($email) : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" maxlength="100" name="nom" value="<?php echo (isset($nom)) ? htmlentities($nom) : ''; ?>" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-control" maxlength="100" name="prenom" value="<?php echo (isset($prenom)) ? htmlentities($prenom) : ''; ?>" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Téléphone</label>
                                <input type="text" class="form-control" maxlength="10" minlength="10" name="tel" value="<?php echo (isset($tel)) ? htmlentities($tel) : ''; ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Adresse</label>
                                <input type="text" class="form-control" name="adresse" maxlength="150" value="<?php echo (isset($adresse)) ? htmlentities($adresse) : ''; ?>" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Code postal</label>
                                <input type="text" class="form-control" maxlength="5" minlength="5" name="code_postal" value="<?php echo (isset($code_postal)) ? htmlentities($code_postal) : ''; ?>" required>
                            </div>
                            <div class="col-sm-8">
                                <label class="form-label">Ville</label>
                                <input type="text" class="form-control" max="100" name="ville" value="<?php echo (isset($ville)) ? htmlentities($ville) : ''; ?>" required>
                            </div>
                            <button class="btn btn-primary my-4">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

<?php include "templates/fragments/footer.php" ?>