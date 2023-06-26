<?php

/*

Fragment de page : Mise en page du bloc du niveau de financement d'un projet

Paramètres : 
    $reste : la somme restante à financer
    $pourcentage : le pourcentage restant à financer

*/

?>

<div class="col-md-4 col-lg-6">
    <h4 class="h5 fst-italic">Niveau de financement du projet : </h3>
    <div class="progress my-4">
        <div class="progress-bar" style="width:<?php echo (floor($pourcentage) > 100) ? 100 : floor($pourcentage);  ?>%"> <?php echo (floor($pourcentage) > 100) ? 100 : floor($pourcentage);  ?>%</div>
    </div>
    <p>Reste à financer : <span class="text-danger fw-semibold"><?php echo ($reste < 0) ? 0 : number_format($reste, 0, ',', ' ');  ?></span> €</p>
</div>