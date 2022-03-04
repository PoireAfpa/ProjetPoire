<?php
namespace App\view\controller;
use App\core\Controller;
use App\view\model\User;


class UserController extends Controller{

    public function afficherLogin(){  
        if(strtolower($_SERVER["REQUEST_METHOD"])=="get"){

        $this->renderView("pages/login");

        }

        elseif(strtolower($_SERVER["REQUEST_METHOD"])=="post"){

            if (isset($_POST["email"]) && isset($_POST["password"])){

                $user=(new User())->getOneByMail(($_POST["email"]));
                    if (is_null($user)){
                    
                            $this->renderView("pages/login", ['error'=>"Fucking message"]);
                    return;
                    }
                    if (password_verify($_POST['password'], $user->getPassword())){
                    session_start();
                    $role=$user->getRole();
                    $_SESSION["role"]=$role;
                    $_SESSION["isLogged"]=true;
                    $user->beforeInsertInSession();
                    $_SESSION["user"]=$user;
                 
                    $this->redirectToRoute("dashboard");
                   
                }
                else{
                    $this->renderView("pages/login", ['error'=>"Fucking mdp"]); 
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
        if (!isset($_SESSION["isLogged"])||($_SESSION["isLogged"]=false))
        {
            $this->redirectToRoute("login");
        }
           $this->renderView("pages/dashboard");
           

    }
}