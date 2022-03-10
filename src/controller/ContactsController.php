<?php

namespace App\controller;

use App\core\Controller;
use App\model\Contacts;

class ContactsController extends Controller{

    public function list(){
        $contacts = (new Contacts())->getAll();
        $this->renderView('contact/list', [
            'contacts' => $contacts
        ]);
    }

    public function add(){   
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $contact = new Contacts();
            $contact->setIdClient($_POST['idClient']);
            $contact->setIdFonc($_POST['idFonc']);
            $contact->setNomContact($_POST['nomContact']);
            $contact->setPrenomContact($_POST['prenomContact']);
            $contact->setTelContact($_POST['telContact']);
            $contact->setEmailContact($_POST['emailContact']);
            $contact->setPhoto($_POST['photo']);
            $contact->setDuree($_POST['duree']);
            $contact->insert();
        }
        $this->renderView("dashboard");
    }

    public function edit($idContact){
        $contact=(new Contacts)->getOneById($idContact);
        $args=[];
        if ($contact->getIdClient()!=$_POST["idclient"]){
            $args["idclient"]=$_POST["idclient"];
        }
        if ($contact->getIdFonc()!=$_POST["idfonc"]){
            $args["idfonc"]=$_POST["idfonc"];
        }
        if ($contact->getNomContact()!=$_POST["nomcontact"]){
            $args["nomcontact"]=$_POST["nomcontact"];
        }
        if ($contact->getPrenomContact()!=$_POST["prenomcontact"]){
            $args["prenomcontact"]=$_POST["prenomcontact"];
        }
        if ($contact->getTelContact()!=$_POST["telcontact"]){
            $args["telcontact"]=$_POST["telcontact"];
        }
        if ($contact->getEmailContact()!=$_POST["emailcontact"]){
            $args["emailcontact"]=$_POST["emailcontact"];
        }
        if ($contact->getPhoto()!=$_POST["photo"]){
            $args["photo"]=$_POST["photo"];
        }
        if ($contact->getDuree()!=$_POST["duree"]){
            $args["duree"]=$_POST["duree"];
        }
        $contact->edit($args);
        $this->redirectToRoute("dahsboard/contact/edit/#idcontact");
    }

    public function delete($idContact) {   
        $contact = (new Contacts())->delete($idContact);
        $this->renderView("dashboard");
    }
    
}