"use strict";

// VARIABLES //

let searchResult = document.querySelector("#searchResult");

//FUNCTIONS //

function showSuggestionsOnChange() {

    let ulSearch = document.querySelector(".searchHidden");
    let formSearch = document.querySelector("#formSearch");


    let searchSuggest = searchResult.value
    if (searchSuggest.length > 3) {

        ulSearch.classList.remove("searchHide")
        let myFormData = new FormData(formSearch);
        let init = { method: 'POST',
        body: myFormData}
        fetch('/home/searchInput', init)
            .then(function (response) {

                // return response.text();
                return response.json();
            })
            .then(function (datas) {
                ulSearch.insertAdjacentHTML("beforeend", `<li class ="list-group-item" id ="searchSuggest"><a href="/home/game/${datas[0].Id_Games}">${datas[0].title}</a></li>`)
            })
            .catch(function (error) {
                alert("Erreur : " + error);
            });

    }

}

//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {


    searchResult
        .addEventListener("input",
            showSuggestionsOnChange)
    ulSearch.insertAdjacentHTML("beforeend", `<li class ="list-group-item" id ="searchSuggest"><a href="/home/game/${datas[0].Id_Games}">${datas[0].title}</a></li>`)
});