"use strict";

// VARIABLES //

let submitResult = document.querySelector("#submitResult");
let submitLink;
let submitValue;
let submitLinkValue;
let submitGame = document.querySelector("#submitGame")
let formHidden = document.querySelector(".formHidden");
let idSubmitGame = document.querySelector("#idSubmitGame");


//FUNCTIONS //

function showSubmitSuggestionsOnChange() {

    let ulSubmit = document.querySelector(".submitHidden");
    let formSubmit = document.querySelector("#formSubmit");
    submitValue = submitResult.value

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

                // if there is a response with the ajax request, then we keep the ul empty with the while loop
                if (datas) {
                    while (ulSubmit.firstChild) {
                        ulSubmit.removeChild(ulSubmit.firstChild)
                    }
                    // if there is no result //
                } else if (!datas && submitValue.length === 3) {
                    ulSubmit.insertAdjacentHTML("beforeend", `<li class ="list-group-item" id ="submitSuggest"> Aucun résultat ne correspond à votre recherche</li>`)

                }
                // if there is result, we put them in our ul with the insertAdjacentHtml, by looping our results //
                for (let i = 0; i < datas.length; i++) {

                    ulSubmit.insertAdjacentHTML("beforeend", `<button type ="button" class="list-group-item submitLink" id="${datas[i].Id_Games}">${datas[i].title}</button>`)
                }

                // We aim all our newly created results with a selector all and we loop for adding an event listener changing the input for the form //
                submitLink = document.querySelectorAll(".submitLink")

                submitLink.forEach((target) => {

                    target.addEventListener("click", () => {

                        submitResult.value = target.textContent;
                        submitGame.value = target.textContent
                        idSubmitGame.value = target.id
                    })

                })

                console.log(submitLinkValue.textContent)

            })
            .catch(function (error, datas) {


                console.log(datas)

                console.log(error)

            });

    } else if (submitValue.length == 0) {
        // if we empty the search input, we hide the ul //
        ulSubmit.classList.add("submitHide")
        while (ulSubmit.firstChild) {
            ulSubmit.removeChild(ulSubmit.firstChild)
        }
    }

}

function fillInputSearch() {

    submitResult.value = submitLinkValue.textContent;

    formHidden.classList.remove("formHide")
    submitGame.value = submitLinkValue.textContent
}


//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {


    submitResult
        .addEventListener("input",
            showSubmitSuggestionsOnChange)


});