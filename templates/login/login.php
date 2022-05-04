<!doctype html>
<html lang="fr">
<?php require '../parts/head.php'; ?>

<body>


<?php require '../parts/header.php'; ?>


<main>

    <!--Login section -->

    <section>

        <div class="container shadow-lg rounded bgsection mb-5">
            <div class="row">
                <h2 class="text-center mt-5">Bienvenue !</h2>

                <div class="col-lg-6 col-md-12 col-sm-12 mt-3 mb-5 py-5 welcome ">

                    <div class="row">

                        <form class="mx-auto">
                            <div class="form-group my-3 mx-5 px-5">
                                <div class="mb-4"><h2 class="text-center mt-4">Déjà enregistré?</h2>
                                    <p class="text-center">Saisis tes informations de connexions</p></div>
                                <label for="usernameInput" class="mt-4 mb-3 text-white"> Ton Pseudo: </label>
                                <input
                                        type="text"
                                        class="form-control log mx-auto"
                                        id="usernameInput"
                                        aria-describedby="usernameHelp"
                                        placeholder="Le plus swag des pseudos est-il de retour?"
                                />
                            </div>
                            <div class="form-group mt-3 mb-4 mx-5 px-5">
                                <label for="passwordInput" class="my-3 text-white">Mot de passe: </label>
                                <input
                                        type="password"
                                        class="form-control log mx-auto "
                                        id="passwordInput"
                                        placeholder="Tu t'en rappelles, j'espère ? !"
                                />
                            </div>
                            <a href="user.php">
                                <button

                                        type="button"
                                        class="btn btn-lg bgsection1 mx-auto mt-5 mb-2 px-5 d-flex justify-content-center text-white"
                                        style="margin-top:3.25rem !important"
                                >
                                    Let's go !
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-3 mb-5 py-5 ">
                    <div class="row">
                        <form class="mx-auto">
                            <div class="form-group mx-5 px-5">
                                <div class="mb-4"><h2 class="text-center mt-4">Pas encore inscrit ?</h2>
                                    <p class="text-center">Enregistre tes informations de connexions !</p></div>
                                <label for="emailInput" class="mb-3 text-white"> Ton Adresse Mail: </label>
                                <input
                                        type="email"
                                        class="form-control log mx-auto"
                                        id="emailInput"
                                        aria-describedby="emailHelp"
                                        placeholder="Ne t'en fais pas, on t'enverra pas de pubs ! !"
                                />
                            </div>

                            <div class="form-group  mx-5 px-5">
                                <label for="usernameInput" class="my-3 text-white"> Ton Pseudo: </label>
                                <input
                                        type="text"
                                        class="form-control log mx-auto"
                                        id="usernameRegisterInput"
                                        aria-describedby="usernameHelp"
                                        placeholder="Entre ton pseudo, promis on le jugera pas !"
                                />
                            </div>
                            <div class="form-group mx-5 px-5">
                                <label for="passwordInput" class="my-3 text-white">Mot de passe: </label>
                                <input
                                        type="password"
                                        class="form-control log mx-auto "
                                        id="passwordRegisterInput"
                                        placeholder="Essaie de ne pas l'oublier ! !"
                                />
                            </div>

                            <div class="form-group  mb-4 mx-5 px-5">
                                <label for="passwordInput" class="my-3 text-white"> Vérifie ton mot de passe: </label>
                                <input
                                        type="password"
                                        class="form-control log mx-auto "
                                        id="passwordverifyRegisterInput"
                                        placeholder="Vérifie ton mot de passe quand même, on sait jamais."
                                />
                            </div>
                            <a href="user.php">
                                <button
                                        type="button"
                                        class="btn btn-lg bgsection1 mx-auto mb-2 px-5 d-flex justify-content-center text-white"
                                >
                                    Je m'inscris !
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php require '../parts/footer.php'; ?>

<!-- JS scripts -->

<?php require '../parts/JS_scripts.php';?>

</html>