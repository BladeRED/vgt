"use strict";

//FUNCTIONS //

function onClickModalUser(userId){

    fetch('/admin/users/'+userId)
        .then(function(response){
            // return response.text();
            return response.json();
        })
        .then(function(datas){


            document.getElementById("pseudoEdit").value = datas.pseudo
            document.getElementById("mailEdit").value = datas.mail
            document.getElementById("editForm").action = "/admin/editUsers/"+userId;




        })
        .catch(function(error) {
            alert("Erreur : " + error);
        });

}

//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {


            let mdlBtns = document.querySelectorAll(".mdlBtn")
    mdlBtns.forEach(mdlBtn => {
        mdlBtn.addEventListener('click', function (){
            let userId = this.dataset.userid;
            onClickModalUser(userId)
        });
    });




});