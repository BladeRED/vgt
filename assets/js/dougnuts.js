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

        if (dateBegin) {
            histCateg = histDates;
            compCateg = compDates;
            extraCateg = extraDates;
        }

        let dataPie1 = JSON.parse(allTimesUsers);
        let dataPie2 = JSON.parse(allNullTimesUsers);

        let dataPie3 = JSON.parse(histCateg);
        let dataPie4 = JSON.parse(extraCateg);
        let dataPie5 = JSON.parse(compCateg);

        const data = {
                labels: [
                    'Utilisateurs avec temps de jeux',
                    'Utilisateurs sans temps de jeux',

                ],
                datasets: [{
                    label: 'Données utilisateurs',
                    backgroundColor: [
                        '#6B3D5F',
                        '#935482',
                    ],
                    data: [dataPie1, dataPie2],

                }]
            }
        ;


        const config = {
            type: 'doughnut',
            data: data,
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    },
                }
            }

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
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    },
                }
            }
        };


        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            configTime
        );
    }
)
;