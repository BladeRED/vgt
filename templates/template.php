<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- FONTAWESOME -->
    <link href="../assets/fontawesome/css/all.css" rel="stylesheet">
    <!-- SCSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>VGT-VideoGameTime</title>
</head>

<body>


<header>
    <div class="container-fluid">

        <div class="row ">

            <div class="col-lg-4 logo">
                <div class="d-flex flex-row navhead">
                    <!-- Logo -->
                    <a href="default/homepage.php">
                        <img src="../assets/pictures/logo.svg" class="img-fluid py-3 mx-3"
                             style="height: 160px ;width: 160px"
                             alt="VGT_logo">
                    </a>
                    <h1 class="py-5">VideoGameTime</h1>
                </div>
            </div>

            <div class="col-lg-4 searchbar">

                <!-- Searchbar -->
                <div class="d-flex flex-row navhead">
                    <div class="search mt-5 mx-5 py-2 searchbar">
                        <input type="text" class="searchTerm" placeholder="Cherche tes jeux ici !">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 ">
                <!-- Submit and Log buttons-->
                <div class="d-flex flex-row logsubmit">
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="security/submit.php">
                            <img src="../assets/pictures/submit.png" class="img-fluid rounded mx-auto d-block mt-5"
                                 style="height: 64px ;width: 64px" alt="VGT_submit">
                            <p class="text-center"> Soumettre un temps </p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="default/login.php">
                            <img src="../assets/pictures/login.png" class="img-fluid rounded mx-auto d-block mt-5"
                                 style="height: 64px ;width: 64px" alt="VGT_login">
                            <p class="text-center"> Connexion/Inscription </p>
                        </a>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>


<main>
    <!--INSERT CODE HERE -->

</main>


<footer>
    <section class="px-5 py-5 bgsection3">
        <div class="container footercontent">


            <h3 class="text-center mt-2 footertext2">Réseaux sociaux</h3>
            <div class="orgfootercontent">
                <div class="d-flex flex-row justify-content-between footercontent contacticon">

                    <div class="d-flex flex-row justify-content-start footersubcontent animfooter">
                        <!-- Contact us and Data Policy -->

                        <i class="fa-solid fa-envelope fa-2x"></i>
                        <a href="#">
                            <h3 class="py-1 ms-2 footertext">
                                Contactez-nous !
                            </h3>
                        </a>
                    </div>

                    <div class="d-flex flex-row justify-content-end footersubcontent animfooter">
                        <!-- Legal mentions -->

                        <i class="fa-solid fa-scale-balanced fa-2x"></i>
                        <a href="#" class="social">
                            <h3 class="py-1 ms-2 footertext">
                                Mentions Légales !
                            </h3>
                        </a>
                    </div>

                </div>

                <div class="d-flex flex-row justify-content-center bgsection3 footersubcontent socialicon mt-3">
                    <!-- Social Networks -->

                    <a href="#">
                        <i class="fa-brands fa-facebook-square fa-3x me-2"></i>
                    </a>
                    <a href="https://discord.gg/d95kreZjPG">
                        <i class="fa-brands fa-discord fa-3x mx-2" style="width:64px;height:64px"></i>
                    </a>
                    <a href="#" class="social">
                        <i class="fa-brands fa-twitter-square fa-3x ms-2"></i>
                    </a>


                </div>
            </div>

        </div>
    </section>
</footer>

<!-- JS scripts -->

<!--BOOTSTRAP MIN.JS -->
<script crossorigin="anonymous"
        src="../assets/js/bootstrap.bundle.min.js"></script>

<!--JS CUSTOM -->

<script crossorigin="anonymous"
        src="../assets/js/custom.js"></script>


</body>
</html>