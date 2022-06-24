"use strict";

// VARIABLES //

let searchResult = document.querySelector("#searchResult");


//FUNCTIONS //

function showSuggestionsOnChange() {

    // We select the ul that is hidden by default and the datas from the form //

    let ulSearch = document.querySelector(".searchHidden");
    let formSearch = document.querySelector("#formSearch");


    let searchValue = searchResult.value;

    // if the input of the search bar is 3 at least we can do our search //

    if (searchValue.length > 2) {

        // removing the firstchild at each search input for avoiding double entries //
        ulSearch.classList.remove("searchHide");
        let myFormData = new FormData(formSearch);
        let init = {
            method: 'POST',
            body: myFormData
        };

        // our Ajax request using fetch method //

        fetch('/home/searchInput', init)
            .then(function (response) {

                // return response.text();
                return response.json();
            })
            .then(function (datas) {

                // if we found results, we keep remove firstchild for avoiding double entries //
                if (datas) {
                    while (ulSearch.firstChild) {
                        ulSearch.removeChild(ulSearch.firstChild);
                    }
                    // if there is no result at first search //
                } else if (!datas && searchValue.length === 3) {
                    ulSearch.insertAdjacentHTML("beforeend", `<li class ="list-group-item" id ="searchSuggest"> Aucun résultat ne correspond à votre recherche</li>`);

                }

                // looping for our different results //
                for (let i = 0; i < datas.length; i++) {

                    ulSearch.insertAdjacentHTML("beforeend", `<li class ="list-group-item " id ="searchSuggest"><a href="/home/game/${datas[i].Id_Games}" class="searchLinks">${datas[i].title}</a></li>`);
                }


            })
            .catch(function (error, datas) {


                console.log(error);

            });
        // if we erase all our input value from the searchbar //
    } else if (searchValue.length == 0) {

        ulSearch.classList.add("searchHide")
        while (ulSearch.firstChild) {
            ulSearch.removeChild(ulSearch.firstChild);
        }
    }

}

//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {


    searchResult
        .addEventListener("input",
            showSuggestionsOnChange);

});