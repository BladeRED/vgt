<!doctype html>
<html lang="fr">
<?php require '../parts/head.php'; ?>

<body>


<?php require '../parts/header.php'; ?>


<main>
    <!--Personal data gestion section-->
    <section>
        <div class="container-fluid bgsection my-5">
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <div class="d-flex flex-row justify-content-start ms-5 ps-5 me-5 staticon ">
                        <img src="../../assets/pictures/vegeta_1771.jpg" class="img-fluid shadow-lg rounded"
                             style="max-height: 128px ; max-width: 128px"
                             alt="VGT_avatar">
                        <h2 class="py-5 ms-4">
                            <!-- Numbers will be changed when the bdd will be implemented -->
                            Vegeta_88
                        </h2>

                    </div>
                    <button
                            type="button"
                            class="btn btn-lg bgsection1 mx-auto mb-5 d-flex justify-content-center text-white dataperso"
                            style="margin-top:3.25rem !important"
                            value="Show"
                    >
                        Afficher mes données personnelles
                    </button>
                </div>

                <div class="col-lg-6 my-5">
                    <h2 class="text-center mb-5">Informations personnelles</h2>
                    <p class="my-3 text-center"> 999 999 999 jeux enregistrés</p>
                    <p class="my-3 text-center"> 999 999 999 temps de jeux</p>
                    <p class="my-3 text-center"> 999 999 999 reviews</p>
                    <p class="my-3 text-center">Inscrit depuis le: 25 Décembre 2021</p>
                </div>

            </div>


        </div>

        <div class="container datahidden datahide">
            <h2 class="text-center mb-4">Mes données personnelles</h2>
            <div class="row">
                <form class="mx-auto">
                    <div class="form-group mx-5 px-5 d-flex flex-column justify-content-center">
                        <label for="emailEditInput" class="mb-3 text-white text-center"> Ton Adresse Mail: </label>
                        <input
                                type="email"
                                class="form-control log mx-auto w-50"
                                id="emailEditInput"
                                aria-describedby="emailHelp"
                                placeholder="SarabaDaBulmaTrunks@SoshiteKakarotto.jp"
                        />
                    </div>

                    <div class="form-group  mx-5 px-5 d-flex flex-column justify-content-center">
                        <label for="usernameEditInput" class="my-3 text-white text-center"> Ton Pseudo: </label>
                        <input
                                type="text"
                                class="form-control log mx-auto w-50"
                                id="usernameEditInput"
                                aria-describedby="usernameHelp"
                                placeholder="Vegeta_88"
                        />
                    </div>
                    <div class="form-group mx-5 px-5 d-flex flex-column justify-content-center">
                        <label for="passwordEditInput" class="my-3 text-white text-center">Mot de passe: </label>
                        <input
                                type="password"
                                class="form-control log mx-auto w-50"
                                id="passwordEditInput"
                                placeholder="**********"
                        />
                    </div>

                    <div class="form-group  mb-4 mx-5 px-5 d-flex flex-column justify-content-center">
                        <label for="passwordverifyEditInput" class="my-3 text-white text-center"> Vérifie ton mot de
                            passe: </label>
                        <input
                                type="password"
                                class="form-control log mx-auto w-50"
                                id="passwordverifyEditInput"
                                placeholder="**********"
                        />
                    </div>
                    <a href="#">
                        <button
                                type="button"
                                class="btn btn-lg bgsection1 mx-auto my-5 px-5 d-flex justify-content-center text-white"
                        >
                            Le changement, c'est maintenant !
                        </button>
                    </a>
                </form>
            </div>


        </div>

    </section>

    <!--Games management section-->
    <section>

        <div class="container gamelist bgsection mt-5 mb-5 px-5 rounded-3">
            <h2 class="text-center pt-5"> Mes jeux</h2>
            <div class="container  my-5 pt-2 pb-5 px-5 rounded">
                <select class="form-select mb-5 w-25 gamelistselect" aria-label="Selectionner une liste de jeux">
                    <option selected>Tous les jeux</option>
                    <option value="1">Mes RPG</option>
                    <option value="2">Mes FPS</option>
                    <option value="3">Non-finis</option>
                </select>
                <div class="d-flex justify-content-center">
                    <table class="table table-dark table-striped w-100 px-5">
                        <thead>
                        <tr>
                            <th scope="col" class="colgame"><h3 class="text-center ">Jeux</h3></th>
                            <th scope="col"><h3 class="text-center">Titre</h3></th>
                            <th scope="col"><h3 class="text-center">Plateforme(s)</h3></th>
                            <th scope="col"><h3 class="text-center">Genre(s)</h3></th>
                            <th scope="col"><h3 class="text-center">Temps de jeux</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row" class="d-flex justify-content-center colgame">
                                <div class="flip-card my-5 gamecardTable" style="width:12rem;height:18rem;">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="../../assets/pictures/Elden_Ring.jpg" class="img-fluid w-100"
                                                 style="width:12rem;height:18rem;border-radius: 30px" alt="Elden Ring">
                                        </div>
                                        <div class="flip-card-back">
                                            <h2 class="mt-4">Elden Ring</h2>
                                            <p class="text-white mt-4">Temps de jeu moyen:</p>
                                            <p class="text-white-50">999h 99 min 59s</p>
                                            <p class="text-white">Note moyenne des utilisateurs:</p>
                                            <p class="text-white-50">4.5/5</p>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <td>Elden Ring</td>
                            <td>PS4</td>
                            <td>Aventure, Action, Monde Ouvert</td>
                            <td>999 h 59min 59s</td>
                        </tr>
                        <tr>
                            <th scope="row" class="d-flex justify-content-center colgame">
                                <div class="flip-card my-5 gamecardTable" style="width:12rem;height:18rem;">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="../../assets/pictures/Elden_Ring.jpg" class="img-fluid w-100"
                                                 style="width:12rem;height:18rem;border-radius: 30px" alt="Elden Ring">
                                        </div>
                                        <div class="flip-card-back">
                                            <h2 class="mt-4">Elden Ring</h2>
                                            <p class="text-white mt-4">Temps de jeu moyen:</p>
                                            <p class="text-white-50">999h 99 min 59s</p>
                                            <p class="text-white">Note moyenne des utilisateurs:</p>
                                            <p class="text-white-50">4.5/5</p>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <td>Elden Ring</td>
                            <td>PS4</td>
                            <td>Aventure, Action, Monde Ouvert</td>
                            <td>999 h 59min 59s</td>
                        </tr>

                        <tr>
                            <th scope="row" class="d-flex justify-content-center colgame">
                                <div class="flip-card my-5 gamecardTable" style="width:12rem;height:18rem;">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="../../assets/pictures/Elden_Ring.jpg" class="img-fluid w-100"
                                                 style="width:12rem;height:18rem;border-radius: 30px" alt="Elden Ring">
                                        </div>
                                        <div class="flip-card-back">
                                            <h2 class="mt-4">Elden Ring</h2>
                                            <p class="text-white mt-4">Temps de jeu moyen:</p>
                                            <p class="text-white-50">999h 99 min 59s</p>
                                            <p class="text-white">Note moyenne des utilisateurs:</p>
                                            <p class="text-white-50">4.5/5</p>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <td class="my-5 py-5">Elden Ring</td>
                            <td class="my-5 py-5">PS4</td>
                            <td class="my-5 py-5">Aventure, Action, Monde Ouvert</td>
                            <td class="my-5 py-5">999 h 59min 59s</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </section>
</main>


<?php require '../parts/footer.php'; ?>

<!-- JS scripts -->

<?php require '../parts/JS_scripts.php';?>

</body>

</html>