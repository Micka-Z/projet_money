// Récupérer le bouton "refuser"
let btnRef = document.querySelector("#btn-refuse");
// Récupérer le bouton "Valider"
let btnVal = document.querySelector("#btn-valide");
// Récupérer la div "refuser"
let maDivRef = document.querySelector("#div-refuse");
// Récupérer le bouton "Valider"
let maDivVal = document.querySelector("#div-valide");

// On ajoute un évènement click sur le bouton "refuser"
btnRef.addEventListener("click", function (){
    // On fait disparaître le textarea "valider"
    maDivVal.style.display = "none";
    // On fait appara^tre le textarea "refuser"
    maDivRef.style.display = "block";
});
btnVal.addEventListener("click", function (){
    // On fait disparaître le textarea "refuser"
    maDivRef.style.display = "none";
        // On fait appara^tre le textarea "valider"
    maDivVal.style.display = "block";
});