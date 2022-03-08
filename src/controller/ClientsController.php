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
            $client->setCa($_POST['ca']);
            $client->setAdresseclient($_POST['adresseclient']);
            /* TODO remplir toutes les propriétés du client */
            
            $client->insert();
        }
        
        $this->renderView("client/add");
    }
}