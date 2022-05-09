<!doctype html>
<html lang="fr">
<?php require 'templates/parts/head.php'; ?>

<body>


<?php require 'templates/parts/header.php'; ?>


<main>

    <!--Login section -->

    <section>

        <div class="container shadow-lg rounded bgsection mb-5">
            <div class="row">
                <h2 class="text-center mt-5">Bienvenue !</h2>
                <?php
                $host = 'mariadb';
                $user = 'user';
                $password = 'zeus';
                $db = 'database';
                $conn = new mysqli($host,$user,$password,$db);
                if(!$conn) {echo 'MySQL connection error<br />';}
                else{
                    echo 'MySQL connection is OK<br />';
                    mysqli_close($conn);
                }
                ?>


                <div class="col-lg-6 col-md-12 col-sm-12 mt-3 mb-5 py-5 welcome ">

                    <div class="row">

                        <form class="mx-auto" method="post" action="index.php?controller=security&action=login">
                            <div class="form-group my-3 mx-5 px-5">
                                <div class="mb-4"><h2 class="text-center mt-4">Déjà enregistré?</h2>
                                    <p class="text-center">Saisis tes informations de connexions</p></div>
                                <label for="pseudoInput" class="mt-4 mb-3 text-white"> Ton Pseudo: </label>
                                <input
                                        type="text"
                                        class="form-control log mx-auto"
                                        id="pseudoInput"
                                        name="pseudoInput"
                                        placeholder="Le plus swag des pseudos est-il de retour?"
                                />
                            </div>
                            <div class="form-group mt-3 mb-4 mx-5 px-5">
                                <label for="passwordInput" class="my-3 text-white">Mot de passe: </label>
                                <input
                                        type="password"
                                        class="form-control log mx-auto "
                                        id="passwordInput"
                                        name="passwordInput"
                                        placeholder="Tu t'en rappelles, j'espère ? !"
                                />
                            </div>
                                <button

                                        type="submit"
                                        class="btn btn-lg bgsection1 mx-auto mt-5 mb-2 px-5 d-flex justify-content-center text-white"
                                        style="margin-top:3.25rem !important"
                                >
                                    Let's go !
                                </button>

                        </form>
                        <?php
                        if (!is_null($errors)) {
                            foreach ($errors as $error) {
                                echo '<div class="alert alert-light logerror" role="alert">
  ' . $error . '
</div>';
                            }
                        }
                        ?>
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
                            <a href="index.php?controller=login&action=user">
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


<?php require 'templates/parts/footer.php'; ?>

<!-- JS scripts -->

<?php require 'templates/parts/JS_scripts.php';?>

</html>