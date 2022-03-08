<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS & JS links for geolocation map-->
    <link rel="stylesheet" type="text/css"
          href="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/css/stylemap.css"/>
    <script src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/js/indexmap.js"
            defer></script>





</head>
<body>

<header>
    <nav class="navbar  navbar-expand-lg sticky-top navbar-light bg-light ">
        <a class="navbar-brand" href="">ABI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ("/" . ($_SERVER['QUERY_STRING']) == "/home") {
                        echo " active";
                    } ?>" href="http://localhost/projetPoire/home">Home</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link<?php if ("/" . ($_SERVER['QUERY_STRING']) == "/dashboard") {
                        echo " active";
                    } ?>" href="http://localhost/projetPoire/dashboard">Dashboard</a>
                </li>
                <?php if (session_status() == PHP_SESSION_ACTIVE) {
                    echo '  <li class="nav-item">
        <a class="nav-link" href="http://localhost/projetPoire/logout"<?php if ("/".($_SERVER["QUERY_STRING"])=="/logout"){echo" active";}?>Logout</a>
      </li>';
                } else {
                    echo '<li class="nav-item">
        <a class="nav-link" href="http://localhost/projetPoire/login">Login</a>
      </li>';
                }; ?>

            </ul>
            <?php if ((("/" . ($_SERVER['QUERY_STRING']) == "/dashboard")) && (session_status() == PHP_SESSION_ACTIVE) && ($_SESSION["role"] == "admin")) {
                echo "
   
         <form class='form-inline my-2 my-lg-0'>
      
            <input type='search' class='form-control mr-sm-2'  placeholder='Chercher un dossier'>
        
         <a class='nav-link'name='btnSearch'value='afficher'type='submit'>Rechercher</a>
        
          </form> 
        ";
            }; ?>


    </nav>
</header>

<?= $content ?>


<footer class="bg-light text-center fixed-bottom text-lg-start">
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="fs-5 text p-1">Adresse</h4>

                <div class="place">
                    <span class="fas fa-map-marker-alt"></span>
                    <span class="text">3 Allée de la Grande Egalonne</span>
                    <span class="text">35740 PACÉ</span>
                </div>
                <div class="phone">
                    <span class="fas fa-phone-alt"></span>
                    <span class="text">09-09-09-09-09</span>
                </div>
                <div class="email">
                    <span class="fas fa-envelope"></span>
                    <span class="text">poire.afpa@gmail.com</span>
                </div>
            </div>
            <div class="col">
                <h4 class="text-center fs-5 text p-1">A propos de nous</h4>
                <div class="text-center fs-6 text p-1">Lorem idivsum dolor sit amet consectetur adipisicing elit.
                    Corrupti exercitationem cum dolores soluta
                    repudiandae corporis asperiores, tenetur repellendus dolore quibusdam quam vitae illo amet?
                </div>
            </div>

            <!-- Geolocation map-->
            <div class="col text-end ">

                <div id="map"></div>
            </div>

        </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #8fcdf6;">
        © 2022 Copyright:
        <a class="text-dark" href="https://github.com/PoireAfpa/ProjetPoire">Equipe Poire</a>
    </div>
    <!-- Copyright -->
    </div>
</footer>
<script src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/js/jquery.js" type="text/javascript"></script>
<script src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript"
        src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/js/jquery.dataTables.js"
        defer></script>
<script type="text/javascript"
        src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/js/DT_bootstrap.js"
        defer></script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLiBq3ZJOp4DFHowwSkni3sgejNpE_HN0&callback=initMap&libraries=&v=weekly"
        async></script>

</body>
</html>
