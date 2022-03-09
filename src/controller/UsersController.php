<?php

namespace App\controller;

use App\core\Controller;
use App\model\Users;

class UsersController extends Controller{
   
    public function afficherLogin(){  
        if(strtolower($_SERVER["REQUEST_METHOD"])=="get"){
            $this->renderView("login");
        }
        elseif(strtolower($_SERVER["REQUEST_METHOD"])=="post"){
            if (isset($_POST["loginuser"]) && isset($_POST["passuser"])){
                $user=(new Users())-> getOneByLogin(($_POST["loginuser"]));
                if (is_null($user)){
                    $this->renderView("login", ['error'=>"Fucking message"]);
                    return;
                }
                if (/*password_verify*/($_POST['passuser']== $user->getPassUser())){
                    session_start();
                    $role=$user->getRole();
                    $_SESSION["role"]=$role;
                    $_SESSION["isLogged"]=true;
                    $user->beforeInsertInSession();
                    $_SESSION["user"]=$user;
                    $this->redirectToRoute("dashboard");
                }
                else{
                    $this->renderView("login", ['error'=>"Fucking mdp"]); 
                    return;
                }
            }
        }
    }

    public function afficherLogout(){
        session_start();
        session_destroy();
        $this->redirectToRoute("login");
    }

    public function afficherDashboard(){ 
        session_start();
        if (!isset($_SESSION["isLogged"])||($_SESSION["isLogged"]=false)){
            $this->redirectToRoute("login");
        }
        $this->renderView("dashboard");
    }

    public function list(){
        $users = (new Users())->getAll();
        return $users;
    }

    public function edit($iduser){
        $user=(new Users)->getOneById($iduser);
        $args=[];
        if ($user->getLoginUser()!=$_POST["loginuser"]){
           $args["loginuser"]=$_POST["loginuser"];
        }
        if ($user->getPassUser()!=$_POST["passuser"]){
            $args["passuser"]=$_POST["passuser"];
        }
        if ($user->getRole()!=$_POST["role"]){
            $args["role"]=$_POST["role"];
        }
        $user->edit($args);
        $this->redirectToRoute("dashboard");
    }
    
    public function deleteUser($iduser) {   
        $user = (new Users())->delete($iduser);
        $this->renderView("dashboard");
    }

}