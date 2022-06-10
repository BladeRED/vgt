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
        fetch('/searchInput', init)
            .then(function (response) {
                console.log("prout")
                // return response.text();
                return response.json();
            })
            .then(function (datas) {


                searchSuggest = datas.title

                ulSearch.insertAdjacentHTML("beforeend", `<li class ="list-group-item" id ="searchSuggest"><a href="$(datas.id)">${datas.title}</a></li>`)
                console.log(searchSuggest);


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

});