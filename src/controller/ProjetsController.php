<?php
namespace App\controller;

use App\core\Controller;
use App\model\Projets;

class ProjetsController extends Controller 
{
    public function list(){
        $contacts = (new Projets())->getAll();
        $this->renderView('contact/list', [
            'contacts' => $contacts
        ]);
    }

    public function add(){   
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $projet = new Projets();
            $projet->setAbregeProjet($_POST['abregeprojet']);
            $projet->setNomProjet($_POST['nomprojet']);
            $projet->setTypeProjet($_POST['typeprojet']);
            $projet->insert();
        }
        $this->renderView("contact/add");
    }

    
    public function edit($codeprojet){
        $projet=(new Projets)->getOneById($codeprojet);
        $args=[];
        if ($projet->getAbregeProjet()!=$_POST["abregeprojet"]){
            $args["abregeprojet"]=$_POST["abregeprojet"];
        }
        if ($projet->getNomProjet()!=$_POST["nomprojet"]){
            $args["nomprojet"]=$_POST["nomprojet"];
        }
        if ($projet->getTypeProjet()!=$_POST["typeprojet"]){
            $args["typeprojet"]=$_POST["typeprojet"];
        }
        $projet->edit($args);
        $this->redirectToRoute("dahsboard/contact/edit/#idcontact");
    }

    public function delete($codeprojet) {   
        $projet = (new Projets())->delete($codeprojet);
        $this->renderView("contact/delete");
    }
}