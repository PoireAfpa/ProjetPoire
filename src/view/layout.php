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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"defer></script>

    

    <!-- CSS & JS links for geolocation map-->
    <link rel="stylesheet" type="text/css"
          href="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/css/stylemap.css"/>
    <script src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/js/indexmap.js"
            defer></script>
  
            <!-- CSS Gen  -->
<link rel="stylesheet" type="text/css"
          href="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . BASE_URI ?>/public/css/style.css"/>





</head>
<body>

<header>
    <nav class="navbar  navbar-expand-lg fixed-top navbar-light bg-light ">
    <a href="http://localhost/projetPoire/home" class="navbar-left"><img src="http://localhost/projetPoire/public/img/Poire.png" style="height:40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                <?php if (("/" . ($_SERVER['QUERY_STRING']) == "/home") && (session_status() == PHP_SESSION_ACTIVE)){
                        echo " <a class='nav-link active' href='http://localhost/projetPoire/home'>Home</a> </li>";  
                        echo " <li class='nav-item'><a class='nav-link ' href='http://localhost/projetPoire/dashboard'>Dashboard</a>  </li>"; 
                        echo " <li class='nav-item'><a class='nav-link ' href='http://localhost/projetPoire/logout'>Logout</a>  </li>"; 
                        }
                        elseif (("/" . ($_SERVER['QUERY_STRING']) == "/dashboard") && (session_status() == PHP_SESSION_ACTIVE)){
                            echo " <a class='nav-link ' href='http://localhost/projetPoire/home'>Home</a> </li>";  
                            echo " <li class='nav-item active'><a class='nav-link ' href='http://localhost/projetPoire/dashboard'>Dashboard</a>  </li>"; 
                            echo " <li class='nav-item'><a class='nav-link ' href='http://localhost/projetPoire/logout'>Logout</a>  </li>"; 
                            }
                        elseif("/" . ($_SERVER['QUERY_STRING']) == "/home"){
                            echo " <a class='nav-link active' href='http://localhost/projetPoire/home'>Home</a> </li>"; 
                            echo " <a class='nav-link ' href='http://localhost/projetPoire/login'>Login</a> </li>";  
                        }
                        else{

                            echo " <a class='nav-link ' href='http://localhost/projetPoire/home'>Home</a> </li>"; 
                            echo " <a class='nav-link active' href='http://localhost/projetPoire/login'>Login</a> </li>";  
                        }


                        


                         ?>
                            
                        
                        
                        
                        
                        
                        
                        
                


    </nav>
</header>

<?= $content ?>


<footer class="bg-light text-center fixed-bottom text-lg-start">
    <div class="container">
        <div class="row">
            
            <div class="col"  colspan="4">
            <a href="poire." class="img" ><img src="http://localhost/projetPoire/public/img/ABILogo.png" style="height:190px;"></a>   
            </div>

            <div class="col"  colspan="4">
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
                <div class="text">
                    <span class="fas fa-envelope"></span>
                    <a class="nav-link <?php if ("/" . ($_SERVER['QUERY_STRING']) == "/contact") {
                        echo " active";
                    } ?>" style="color:#000000;" href='http://localhost/projetPoire/contact'>Contact</a>
                </div>
            </div>

            <!-- Geolocation map-->
            <div class="col text-end" colspan="4">

                <div id="map" style="height:100%"></div>
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