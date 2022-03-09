<?php

namespace App\controller;

use App\core\Controller;
use App\model\Clients;

class ClientsController extends Controller
{
    public function list()
    {

        $clients = (new Clients())->getAll();

        $this->renderView('client/list', [
            'clients' => $clients
        ]);
    }
    public function addClient()
    {   
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $client = new Clients();
            $client->setIdsect($_POST['idsect']);
            $client->setRaisonsociale($_POST['raisonsociale']);
            $client->setCa($_POST['ca']);
            $client->setAdresseclient($_POST['adresseclient']);
            $client->setCodepostal($_POST['codepostal']);
            $client->setVilleclient($_POST['villeclient']);
            $client->setEffectif($_POST['effectif']);
            $client->setTelephoneclient($_POST['telephoneclient']);
            $client->setTypeclient($_POST['typeclient']);
            $client->setNatureclient($_POST['natureclient']);
            $client->setCommentaireclient($_POST['commentaireclient']);
            
            
            $client->insert();
        }
        
        $this->renderView("dashboard");
    }

    public function deleteClient($idclient) 
    {   
        $client = (new Clients())->delete($idclient);
        $this->renderView("dashboard");
    }


    public function editClient($idclient){
        $client=(new Clients)->getOneById($idclient);
        $args=[];
        if ($client->getIdsect()!=$_POST["idsect"]){
            $args["idsect"]=$_POST["idsect"];
        }
        if ($client->getRaisonsociale()!=$_POST["raisonsociale"]){
         $args["raisonsociale"]=$_POST["raisonsociale"];
     }
     if ($client->getCa()!=$_POST["ca"]){
         $args["ca"]=$_POST["ca"];
     }
     if ($client->getAdresseclient()!=$_POST["adressseclient"]){
        $args["adressseclient"]=$_POST["adressseclient"];
    }
    if ($client->getCodepostal()!=$_POST["codepostal"]){
        $args["codepostal"]=$_POST["codepostal"];
    }
    if ($client->getVilleclient()!=$_POST["villeclient"]){
        $args["villeclient"]=$_POST["villeclient"];
    }
    if ($client->getEffectif()!=$_POST["effectif"]){
        $args["effectif"]=$_POST["effectif"];
    }
    if ($client->getTelephoneclient()!=$_POST["telephoneclient"]){
        $args["telephoneclient"]=$_POST["telephoneclient"];
    }
    if ($client->getTypeclient()!=$_POST["typeclient"]){
        $args["typeclient"]=$_POST["typeclient"];
    }
    if ($client->getNatureclient()!=$_POST["natureclient"]){
        $args["natureclient"]=$_POST["natureclient"];
    }
    if ($client->getCommentaireclient()!=$_POST["commentaireclient"]){
        $args["commentaireclient"]=$_POST["commentaireclient"];
    }
     $client->edit($args);
     $this->redirectToRoute("dashboard");
     }
}