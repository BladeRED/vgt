<!doctype html>
<html lang="fr">
<?php require 'templates/parts/head.twig' ; ?>

<body>


<?php require 'templates/parts/headeradmin.twig' ; ?>


<main>
    <!--INSERT CODE HERE -->
    <div class="container my-5">
        <div class="row mb-3">

            <div class="col-lg-5 d-flex justify-content-center">
                <p class="me-3"> Choisissez la période à analyser:</p>
                <div class="form-group">
                    <input id="dateBegin" type="date" class="form-control">
                </div>

            </div>
            <div class="col-lg-5 d-flex justify-content-start ">
                <p class="me-3"> Au:</p>

                <div class="form-group">
                    <input id="dateEnd" type="date" class="form-control">
                </div>

                <button type="submit"
                        class="btn btn ms-4 align-self-start pink text-white">Charger
                </button>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 chartTime">
                        <h3 class="text-center">Utilisateurs</h3>
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>
                    <div class="col-lg-6 chartTime">
                        <h3 class="text-center">Temps de jeux</h3>
                        <div>
                            <canvas id="myChart2"></canvas>
                        </div>

                    </div>

                </div>


            </div>
            <div class="col-lg-6 shadow-lg-rounded bgsection">

                <h2 class="text-center my-3"> Statistiques globales</h2>
                <div class="row">
                    <div class="col-lg-6">

                        <div class="d-flex flex-column align-items-center">
                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="d-flex flex-column align-items-center">
                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                            <h5 class = "fw-bold">
                                Nouveaux utilisateurs:
                            </h5>
                            <p> 999 999 999 </p>

                        </div>


                    </div>


                </div>


            </div>
        </div>


    </div>


</main>


<?php require 'templates/parts/footer.twig' ; ?>

<!-- JS scripts -->

<?php require 'templates/parts/JS_scripts.twig';?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = [
        'Utilisateurs inscrits',
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
            data: [70, 30],
        }]
    };

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
            data: [70, 30, 25],
        }]
    };

    const configTime = {
        type: 'doughnut',
        data: dataTime,
    };
</script>

<script>

</script>

<script>

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        configTime
    );
</script>
</body>
</html>