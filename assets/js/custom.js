/////////////////////////////////////////////// CUSTOM JS HERE /////////////////////////////////////////////////////////
"use strict";


// VARIABLES //

let btn = document.querySelector(".dataperso");
let btn2 = document.querySelector(".togglebutton");
let btn3 = document.querySelector(".sectionbutton");
let btn4 = document.querySelector(".editAdmin");

//FUNCTIONS //

function privateDataToggle() {

    document.querySelector(".datahidden").classList.toggle("datahide");

    if (btn.textContent === "Masquer mes données personnelles")
        btn.textContent = "Afficher mes données personnelles";
    else btn.textContent = "Masquer mes données personnelles";


}

function hideToggle() {

    document.querySelector(".hidden").classList.toggle("hide");
    if (btn2.textContent === "Finalement non")
        btn2.textContent = "Ajouter une review";
    else btn2.textContent = "Finalement non";


}


function hideSection() {

    document.querySelector(".hidden").classList.toggle("hide");
    if (btn3.textContent === "Masquer les reviews")
        btn3.textContent = "Voir les reviews";
    else btn3.textContent = "Masquer les reviews";


}

function editModal(){

    document.querySelector(".editModal").classList.add("prout")


}

//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {

    if (btn) {

        document
            .querySelector(".dataperso")
            .addEventListener("click", privateDataToggle)

    } else if (btn2) {

        document
            .querySelector(".togglebutton")
            .addEventListener("click", hideToggle)

    } else if (btn3) {


        document
            .querySelector(".sectionbutton")
            .addEventListener("click", hideSection)

    }else if (btn4) {

        document
            .querySelector(".editAdmin")
            .addEventListener("click", editModal)


    }

});