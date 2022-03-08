<?php
namespace App\controller;
use App\core\Controller;

//recup requetes
//demander au modele de recuperer les infos et structures
//recupere contenu de modele
// traiter
// envoyer à view


class DefaultController extends Controller{


public function afficherHome(){
    
        session_start();
    if (!empty($_SESSION)){
        $this->renderView("../view/home");

}else{
    session_destroy();
    $this->renderView("../view/home");
}

}
}