<?php

namespace App\controller;

use App\core\Controller;
use app\model\Users;

//recup requetes
//demander au modele de recuperer les infos et structures
//recupere contenu de modele
// traiter
// envoyer à view


class DefaultController extends Controller{

    public function afficherHome(){
        session_start();
        if (!empty($_SESSION)){
            $this->renderView("home");
        }
        else{
            session_destroy();
            $this->renderView("home");
        }
    }
    public function afficherContact(){ 
        session_start();
        if (!isset($_SESSION["isLogged"])||($_SESSION["isLogged"]=false)){
            $this->renderView("contact");
        }
       
        else{
            session_destroy();
            $this->renderView("contact");
        }
    }  
 
   
}