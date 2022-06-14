"use strict";

// VARIABLES //

let submitResult = document.querySelector("#submitResult");
let submitSuggest = document.querySelector("#submitSuggest");
let submitLink = document.querySelector("#submitLink")


//FUNCTIONS //

function showSubmitSuggestionsOnChange() {

    let ulSubmit = document.querySelector(".submitHidden");
    let formSubmit = document.querySelector("#formSubmit");
    let submitValue = submitResult.value

    if (submitValue.length > 2) {

        ulSubmit.classList.remove("submitHide")
        let myFormDataSubmit = new FormData(formSubmit);
        let initSub = {
            method: 'POST',
            body: myFormDataSubmit
        }
        fetch('/home/submitInput', initSub)
            .then(function (response) {

                // return response.text();
                return response.json();
            })
            .then(function (datas) {

                if (datas) {
                    while (ulSubmit.firstChild) {
                        ulSubmit.removeChild(ulSubmit.firstChild)
                    }
                } else if (!datas && submitValue.length === 3) {
                    ulSubmit.insertAdjacentHTML("beforeend", `<li class ="list-group-item" id ="submitSuggest"> Aucun résultat ne correspond à votre recherche</li>`)

                }
                for (let i = 0; i < datas.length; i++) {

                    ulSubmit.insertAdjacentHTML("beforeend", `<button type ="button" class="list-group-item" id="submitLink">${datas[i].title}</button>`)
                }


            })
            .catch(function (error, datas) {


                console.log(datas)

                console.log(error)

            });

    } else if (submitValue.length == 0) {

        ulSubmit.classList.add("submitHide")
        while (ulSubmit.firstChild) {
            ulSubmit.removeChild(ulSubmit.firstChild)
        }
    }

}

function fillInputSearch() {

    console.log("Patrick");

}

//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {


    submitResult
        .addEventListener("input",
            showSubmitSuggestionsOnChange)
    if (submitLink) {
        submitLink
            .addEventListener("click", fillInputSearch)
    }
});