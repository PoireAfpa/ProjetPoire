<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>

    <title>ABI</title>

</head>
<body style="background-color: #d8dbdd;">

<header>
<nav class="navbar  navbar-expand-lg sticky-top navbar-light bg-light ">
    <!-- TO DO AJOUTER LOGO
    <img src="" alt="" width="30" height="24">-->
  <a class="navbar-brand" href="">ABI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
         <!--TO DO MISE EN AVANT DES NOMS DE LA NAVBAR SUIVANT LES ROUTES-->
       
      <li class="nav-item">
        <a class="nav-link<?php /*if ("/".($_SERVER['QUERY_STRING'])=="/register"){echo" active";}*/?>" href="#"><strong>Inscription</strong></a><!--INVISIBLE QUAND CONNECTE-->
      </li>
      <li class="nav-item">
      <a class="nav-link <?php /*if ("/".($_SERVER['QUERY_STRING'])=="/home"){echo" active";}*/?>" href="#"><strong>Accueil</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link<?php /* if ("/".($_SERVER['QUERY_STRING'])=="/dashboard"){echo" active";}*/?>" href="#"><strong>Contact</strong></a><!--VISIBLE QUAND CONNECTE-->
      </li>
      <li class="nav-item">
        <a class="nav-link<?php /*if ("/".($_SERVER['QUERY_STRING'])=="/logout"){echo" active";}*/?>" href="#"><strong>Dashboard</strong></a> <!--INVISIBLE QUAND CONNECTE-->
      </li>
      <li class="nav-item">
        <a class="nav-link<?php /*if ("/".($_SERVER['QUERY_STRING'])=="/logout"){echo" active";}*/?>" href="#"><strong>Login</strong></a> <!--INVISIBLE QUAND CONNECTE-->
      </li>
      <li class="nav-item">
        <a class="nav-link<?php /*if ("/".($_SERVER['QUERY_STRING'])=="/login"){echo" active";}*/?>"  href="#"><strong>Logout</strong></a><!--VISIBLE QUAND CONNECTE-->
      </li>
    </ul>
</nav>
</header>
<hr>



<footer>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #8fcdf6;">
    © 2022 Copyright:
    <a class="text-dark" href="https://github.com/PoireAfpa/ProjetPoire">Equipe Poire</a>
  </div>
  <!-- Copyright -->
</footer>
</footer>

</body>
</html>