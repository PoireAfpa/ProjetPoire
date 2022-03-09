<?php
namespace App\controller;

use App\core\Controller;
use App\src\model\Clients;
use App\src\model\Contacts;
use App\src\model\Contrat;
use App\src\model\Documents;
use App\src\model\Projets;
use App\src\model\Users;


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
        $this->renderView("contact/add");
    }

    public function edit($idContact){
        $contact=(new Contacts)->getOneById($idContact);
        $args=[];
        if ($contact->getIdClient()!=$_POST["idClient"]){
            $args["idClient"]=$_POST["idClient"];
        }
        if ($contact->getIdFonc()!=$_POST["idFonc"]){
            $args["idFonc"]=$_POST["idFonc"];
        }
        if ($contact->getNomContact()!=$_POST["nomContact"]){
            $args["nomContact"]=$_POST["nomContact"];
        }
        if ($contact->getPrenomContact()!=$_POST["prenomContact"]){
            $args["prenomContact"]=$_POST["prenomContact"];
        }
        if ($contact->getTelContact()!=$_POST["telContact"]){
            $args["telContact"]=$_POST["telContact"];
        }
        if ($contact->getEmailContact()!=$_POST["emailContact"]){
            $args["emailContact"]=$_POST["emailContact"];
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
        $this->renderView("contact/delete");
    }
    
}