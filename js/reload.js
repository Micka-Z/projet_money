
$(document).ready(function(){
    function recupFinancement() {
        // Rôle : Récupérer les informations pour le bloc de financement
        // Retour : néant
        // Paramètres : néant
        
        // On récupère l'id du projet sur la page
        id = parseInt($('#div-cache').text());
        //console.log("id: " + id);
        // Déclaration de l'url
        let url ="";
        // On construit l'url
        url = "rafraichit_financement.php?";
       
        // Envoyer la requête en mode GET et en lui passant l'id, puis exécution pour l'affichage dans le bloc
        $.ajax(url, {
            method: "GET",
            data: "id=" + id,
            success: affiche_detail,
            error: function() {
                console.error("Erreur de communication")
            },
        });
    }
    // Relance de la fonction toutes les 10s
    setTimeout(recupFinancement(), 10000);
});

function affiche_detail(donnees) {
    // Rôle : Traiter les données envoyées par la requête HTTP
    // Retour: néant
    // Paramètres : 
    //      donnees : données reçues du serveur, donc le fragment à insérer

    //console.log(donnees);
    // On envoie les données récupérées vers le bloc d'affichage
    $('#bloc-financement').html(donnees);
}
