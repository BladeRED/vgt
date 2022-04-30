/////////////////////////////////////////////// CUSTOM JS HERE /////////////////////////////////////////////////////////

// VARIABLES //

let btn = document.querySelector(".togglebutton");


//FUNCTIONS //

function privateDataToggle(){

    document.querySelector(".datahidden").classList.toggle("hide");

}


//CODE PRINCIPAL//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {

    document
        .querySelector(".dataperso")
        .addEventListener("click", privateDataToggle)

    btn.addEventListener("click", function() {

        if (btn.textContent==="Masquer mes données personnelles")
            btn.textContent = "Afficher mes données personnelles";
        else btn.textContent = "Masquer mes données personnelles";

        if (btn.textContent==="Ajouter une review")
            btn.textContent = "Finalement non";
        else btn.textContent = "Ajouter une review";

    })




});