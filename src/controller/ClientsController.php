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
            $client->setRaisonsociale($_POST['raisonsocial']);
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
        
        $this->renderView("client/add");
    }

    public function deleteClient($idclient) 
    {   
        $client = (new Clients())->delete($idclient);
        $this->renderView("client/list");
    }
}