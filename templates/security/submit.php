<!doctype html>
<html lang="fr">
<?php require 'templates/parts/head.php'; ?>

<body>


<?php require 'templates/parts/header.php'; ?>


<main>
    <!--SUBMIT GAMETIME FORM -->
    <section>

        <div class="container bgsection pb-5 mb-5 shadow-lg rounded">
            <div class="row mb-5">
                <div class="col-lg-6 mt-5 ">
                    <div class="d-flex flex-row submitgamesection">
                        <!--RESUME OF THE GAME -->
                        <a href="../../index.php?controller=default&action=game"><img src="../../assets/pictures/Elden_Ring.jpg"
                                                                                      class="img-fluid my-5 ms-5 submitimg"
                                                                                      style="width:18rem;height:24rem;border-radius: 30px" alt="Elden Ring"></a>
                        <div class="d-flex flex-column ms-4 mt-5 submitgametext">
                            <h3>Temps de jeu moyen:</h3>
                            <p> 999 999h 59min 59s</p>
                            <h3>Histoire:</h3>
                            <p> 999 999h 59min 59s</p>
                            <h3>Histoire+Extras</h3>
                            <p> 999 999h 59min 59s</p>
                            <h3>Complétioniste</h3>
                            <p> 999 999h 59min 59s</p>
                        </div>

                    </div>
                    <div class="ms-5 submitnote">
                        <h3>Note moyenne des utillisateurs:</h3>
                        <p> 4.5/5</p>
                    </div>
                </div>

                <div class="col-lg-6 my-5">
                    <!-- FORM -->
                    <h3 class="text-center mt-5 mb-3 ms-5 submitsection"> Soumet ton temps de jeux !</h3>

                    <div class="d-flex flex-column ms-5 submitsection">
                        <label for="plateformes" class="text-center text-white">Choisis une plateforme:</label>

                        <select name="plateformes" id="plateformes" class="mb-3 align-self-center">
                            <option value="PS4">PS4</option>
                            <option value="PS5">PS5</option>
                            <option value="PC">PC</option>
                            <option value="XBOX One">Xbox One</option>
                            <option value="XBOX Series">Xbox Series</option>
                            <option value="Nintendo Switch">Nintendo Switch</option>
                        </select>

                        <label for="categories" class="text-center text-white">Choisis une catégorie de temps de
                            jeu:</label>

                        <select name="categories" id="categories" class="align-self-center">
                            <option value="Histoire">Histoire</option>
                            <option value="Histoire + Extras">Histoire + Extras</option>
                            <option value="Complétioniste">Complétioniste</option>

                        </select>


                        <button
                                type="button"
                                class="btn btn-lg bgsection1 mx-auto mb-3 mt-3 d-flex justify-content-center text-white togglebutton"
                                value="Add"
                        >
                            Ajouter une review
                        </button>
                        <div class="form-floating hidden hide">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                      style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>


                        <label for="note" class="text-center text-white">Choisis une note sur 5:</label>

                        <select name="note" id="note" class="align-self-center">
                            <option value="1">1</option>
                            <option value="2b">2</option>
                            <option value="3s">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <form class="mt-3 d-flex flex-column">
                            <label for="appt-time" class="text-center text-white">Enregistre ton temps
                                (heures/min/secondes) : </label>
                            <input id="appt-time" type="time" name="appt-time" step="2" class="align-self-center">
                        </form>


                        <button
                                type="button"
                                class="btn btn-lg bgsection1 mx-auto mb-5 mt-3 d-flex justify-content-center text-white"
                                value="Validate"
                        >
                            Valider le temps de jeu
                        </button>

                    </div>
                </div>
            </div>
        </div>


    </section>
</main>


<?php require 'templates/parts/footer.php'; ?>

<?php require 'templates/parts/JS_scripts.php';?>

</body>

</html>