"use strict";

// VARIABLES //

let searchResult = document.querySelector("#searchResult");

//FUNCTIONS //

function showSuggestionsOnChange() {

    document.querySelector(".searchHidden").classList.remove("searchHide");

    if (searchResult.value >3){

        console.log ("Mathieu");

    }

}

//MAIN CODE//

// To be sure that the js will be loaded in last position //
document.addEventListener("DOMContentLoaded", function () {


        searchResult
        .addEventListener("input",
            showSuggestionsOnChange)

});