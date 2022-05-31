"use strict";


// VARIABLES //

//FUNCTIONS //

fetch('/admin/users')
    .then(function(response){
        // return response.text();
        return response.json();
    })
    .then(function(datas){
        console.log(datas);
        // callback(datas);
    })
    .catch(function(error) {
        alert("Erreur : " + error);
    });


//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {



});