"use strict";

// VARIABLES //

let searchResult = document.querySelector("#searchResult");
let searchSuggest = document.querySelector("#searchSuggest");

//FUNCTIONS //

function showSuggestionsOnChange() {

    let ulSearch = document.querySelector(".searchHidden");
    let formSearch = document.querySelector("#formSearch");


    let searchValue = searchResult.value
    if (searchValue.length > 2) {

        ulSearch.classList.remove("searchHide")
        let myFormData = new FormData(formSearch);
        let init = {
            method: 'POST',
            body: myFormData
        }
        fetch('/home/searchInput', init)
            .then(function (response) {

                // return response.text();
                return response.json();
            })
            .then(function (datas) {

                if (datas) {
                    while (ulSearch.firstChild) {
                        ulSearch.removeChild(ulSearch.firstChild)
                    }
                }else if(!datas && searchValue.length === 3){
                    ulSearch.insertAdjacentHTML("beforeend", `<li class ="list-group-item" id ="searchSuggest"> Aucun résultat ne correspond à votre recherche</li>`)

                }
                for (let i = 0; i < datas.length; i++) {

                    ulSearch.insertAdjacentHTML("beforeend", `<li class ="list-group-item " id ="searchSuggest"><a href="/home/game/${datas[i].Id_Games}" class="searchLinks">${datas[i].title}</a></li>`)
                }


            })
            .catch(function (error, datas) {


                console.log(datas)

                console.log(error)

            });

    } else if (searchValue.length == 0) {

        ulSearch.classList.add("searchHide")
        while (ulSearch.firstChild) {
            ulSearch.removeChild(ulSearch.firstChild)
        }
    }

}

//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {


    searchResult
        .addEventListener("input",
            showSuggestionsOnChange)

});