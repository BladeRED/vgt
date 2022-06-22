
document.addEventListener("DOMContentLoaded", function () {

    let allTimesUsers = document.getElementById('allTimesUsers').value;
    let allNullTimesUsers = document.getElementById('allNullTimesUsers').value;
    let histCateg = document.getElementById('histCateg').value;
    let extraCateg = document.getElementById('extraCateg').value;
    let compCateg = document.getElementById('compCateg').value;

    // BY DATES //
    let histDates = document.getElementById('histDates').value;
    let compDates = document.getElementById('compDates').value;
    let extraDates = document.getElementById('extraDates').value;
    let dateBegin = document.getElementById('dateBegin').value;

    if (dateBegin){
        histCateg= histDates;
        compCateg = compDates;
        extraCateg= extraDates;
    }


    console.log(dateBegin);
    console.log(histCateg);

    let dataPie1 = JSON.parse(allTimesUsers);
    let dataPie2 = JSON.parse(allNullTimesUsers);

    let dataPie3 = JSON.parse(histCateg);
    let dataPie4 = JSON.parse(extraCateg);
    let dataPie5 = JSON.parse(compCateg);


    const labels = [
        'Utilisateurs avec temps de jeux',
        'Utilisateurs sans temps de jeux',

    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Données utilisateurs',
            backgroundColor: [
                '#6B3D5F',
                '#935482',
            ],
            data: [dataPie1, dataPie2]
        }]
    };
    console.log(data.datasets);
    const config = {
        type: 'doughnut',
        data: data,
    };

    // Gametime chart doughnut //

    const labelsTime = [
        'Histoire',
        'Histoire + Extras',
        'Complétioniste',

    ];

    const dataTime = {
        labels: labelsTime,
        datasets: [{
            label: 'Données temps de jeux',
            backgroundColor: [
                '#6B3D5F',
                '#935482',
                '#c06faa'
            ],

            data: [dataPie3, dataPie4, dataPie5],
        }]
    };
    const configTime = {
        type: 'doughnut',
        data: dataTime,
    };



    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        configTime
    );
});