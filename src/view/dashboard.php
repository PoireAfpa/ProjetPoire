<main>
<?php

use App\core\Dao;
use App\model\Users;
use App\model\Clients;
use App\model\Projets;
use App\model\Contacts;
use App\controller\UsersController;
if ( session_status() == PHP_SESSION_ACTIVE){
 

//---------------------------------------------RH-----------------------------------------------------------------------------------------------------
                if($_SESSION["role"]=="Responsable RH"){
                   require_once __DIR__ . '/user/modals.php';
                   echo '<form method="post"><div class="container-fluid"><div class="justify-content-center"><div class="btn-group col ">';
                   echo '<div class="col-6"><button name="createClb" type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#modalAdd">
                     Ajouter un collaborateur
                   </button></div>';
                   echo ' <div class="col-6"><input type="submit" value=" Afficher tous collaborateurs" class="btn btn-primary btn-lg btn-block" name="viewClb">
                 
                  </div>';
                  echo'</div></div></div></form>';
               
                if (isset($_POST['viewClb'])){
                    $collaborateurs= ((new Users)->getAll());
                    $html=' <table class="table table-striped  table-dark"> <thead class="thead-light">';
                    $html.='  <tr> <th class= "text-center " scope="col">ID</th>  <th class= "text-center " scope="col">LOGIN USER</th>
                    <th class= "text-center " scope="col">PASS USER</th>
                    <th class= "text-center " scope="col">ROLE USER</th>
                    <th class= "text-center " scope="col">ACTIONS</th>
                    <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
                    $html.=' </tr> </thead>';
                    $html.=' <tbody>';
                    $modalEdit="";
                    foreach($collaborateurs as $collaborateur){

                     $html.='<tr>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getIdUser().'</td>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getLoginUser().'</td>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getPassUser().'</td>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getRole().'</td>';
                     $html.=' <td><button  data-id="'.$collaborateur->getIdUser().'" data-login="'.$collaborateur->getLoginUser().'" data-pas="'.$collaborateur->getRole().'" type="submit" name="editClb" data-bs-target="#modalEdit'.$collaborateur->getIdUser().'" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
                     <td><input name="delClb"  value="Supprimer" type="submit" class="btn-sm btn btn-danger test" data-bs-toggle="modal" data-bs-target="#modalDel"/></a></td>';
                     $modalEdit.= '
                     <div class="modal fade" id="modalEdit'.$collaborateur->getIdUser().'" tabindex="-1" >
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="modalEditLabel">Modifier un collaborateur</h5>
                     
                         </div>
                         <form action="'.BASE_URI.'/dahsboard/user/edit/'.$collaborateur->getIdUser().'" method="post">
                         <div class="modal-body">
                         <input type="text" id="login" value="'.$collaborateur->getLoginUser().'" class="form-control" placeholder="Login user" name="loginuser">
                         <input type="text" value="'.$collaborateur->getPassUser().'" class="form-control" placeholder="Pass user" name="passuser">
                         <input type="text" value="'.$collaborateur->getRole().'"class="form-control" placeholder="Pass user" name="role">
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Modifier</button>
                           <button  type="submit" name="docClb" class="btn btn btn-success">Ajouter doc</button>
                         </div>
                         </form>
                       </div>
                     </div>
                     </div>'
                     ;
                  };
                  $html.='</tr></tbody></table>';
                  echo $html;
                  echo $modalEdit;
                  if (isset($_POST['closeList'])){
                      echo "fuck";
                      $html="";
                      echo $html;

                  }
                  

                
                    }}; 
  //-----------------------------------------------------------SECRETAIRE TECHNIQUE-------------------------------------------------------------
 
              

                if($_SESSION["role"]=="Secrétaire Technique"){
                  require_once __DIR__ . '/user/modals.php';
                  echo '<form method="post"><div class="container-fluid"><div class="justify-content-center"><div class="btn-group col ">';
                  echo '<div class="col-6"><input type="submit" value=" Afficher tous collaborateurs" class="btn btn-primary btn-lg btn-block" name="viewClb"> </div>';
                  echo'</div></div></div></form>';
              
               if (isset($_POST['viewClb'])){
                   $collaborateurs= ((new Users)->getAll());
                   $html=' <table class="table table-striped  table-dark"> <thead class="thead-light">';
                   $html.='  <tr> <th class= "text-center " scope="col">ID</th>  <th class= "text-center " scope="col">LOGIN USER</th>
                   <th class= "text-center " scope="col">PASS USER</th>
                   <th class= "text-center " scope="col">ROLE USER</th>
                   <th class= "text-center " scope="col">ACTIONS</th>
                   <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
                   $html.=' </tr> </thead>';
                   $html.=' <tbody>';
                   $modalEdit="";
                 foreach($collaborateurs as $collaborateur){

                    $html.='<tr>';
                    $html.='<td class= "text-center align-middle">'.$collaborateur->getIdUser().'</td>';
                    $html.='<td class= "text-center align-middle">'.$collaborateur->getLoginUser().'</td>';
                    $html.='<td class= "text-center align-middle">'.$collaborateur->getPassUser().'</td>';
                    $html.='<td class= "text-center align-middle">'.$collaborateur->getRole().'</td>';
                    $html.=' <td><button  data-id="'.$collaborateur->getIdUser().'" data-login="'.$collaborateur->getLoginUser().'" data-pas="'.$collaborateur->getRole().'" type="submit" name="editClb" data-bs-target="#modalEdit" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>';
                    $modalEdit.= '
                    <div class="modal fade" id="modalEdit'.$collaborateur->getIdUser().'" tabindex="-1" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalEditLabel">Modifier un collaborateur</h5>
                    
                        </div>
                        <form action="'.BASE_URI.'/dahsboard/user/edit/'.$collaborateur->getIdUser().'" method="post">
                        <div class="modal-body">
                        <input type="text" id="login" value="'.$collaborateur->getLoginUser().'" class="form-control" placeholder="Login user" name="loginuser">
                        <input type="text" value="'.$collaborateur->getPassUser().'" class="form-control" placeholder="Pass user" name="passuser">
                        <input type="text" value="'.$collaborateur->getRole().'"class="form-control" placeholder="Pass user" name="role">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Modifier</button>
                          <button  type="submit" name="docClb" class="btn btn btn-success">Ajouter doc</button>
                        </div>
                        </form>
                      </div>
                    </div>
                    </div>'
                    ;
                   
                 };
                 $html.='</tr></tbody></table>';
                 echo $html;
                 if (isset($_POST['closeList'])){
                  
                     $html="";
                     echo $html;

                 }

               }};



  //-----------------------------------------------------------RESPONSABLE DEVELOPPEMENT---------------------------------------------------------- 
  if($_SESSION["role"]=="Responsable développement"){
    require_once __DIR__ . '/user/modals.php';
    echo '<form method="post"><div class="container-fluid"><div class="justify-content-center"><div class="btn-group col ">';
    echo '<div class="col-6"><button name="createPjt" type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#modalAddPjt">
      Ajouter un projet
    </button></div>';
    echo ' <div class="col-6"><input type="submit" value=" Afficher les projets" class="btn btn-primary btn-lg btn-block" name="viewPjt">
  
   </div>';
   echo'</div></div></div></form>';

 if (isset($_POST['viewPjt'])){
     $projets= ((new Projets)->getAll());
     $html=' <table class="table table-striped  table-dark"> <thead class="thead-light">';
     $html.='  <tr> <th class= "text-center " scope="col">CODE PROJET</th> 
     <th class= "text-center " scope="col">ABREGE PROGE</th>
     <th class= "text-center " scope="col">NOM PROJET</th>
     <th class= "text-center " scope="col">TYPE PROJET</th>
     <th class= "text-center " scope="col">ACTIONS</th>
     <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
     $html.=' </tr> </thead>';
     $html.=' <tbody>';
     $modalEdit="";
   foreach($projets as $projet){

      $html.='<tr>';
      $html.='<td class= "text-center align-middle">'.$projet->getCodeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getAbregeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getNomProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getTypeProjet().'</td>';
      $html.=' <td><button  data-id="'.$projet->getCodeProjet().'" data-login="'.$projet->getNomProjet().'" type="submit" name="editPjt" data-bs-target="#modalEditPjt" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
      <td><input name="delPjt"  value="Supprimer" type="submit" class="btn-sm btn btn-danger test" data-bs-toggle="modal" data-bs-target="#modalDelPjt"/></a></td>';
      $modalEdit.= '
      <div class="modal fade" id="modalEdit'.$collaborateur->getIdUser().'" tabindex="-1" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Modifier un collaborateur</h5>
      
          </div>
          <form action="'.BASE_URI.'/dahsboard/projet/edit/'.$projet->getCodeProjet().'" method="post">
          <div class="modal-body">
          <input type="text" value="'.$projet->getAbregeProjet().'" class="form-control" placeholder="Abregé projet" name="abregeprojet">
          <input type="text" value="'.$projet->getNomProjet().'" class="form-control" placeholder="Nom projet" name="nomprojet">
          <input type="text" value="'.$projet->getTypeProjet().'"class="form-control" placeholder="Type projet" name="typeprojet">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <button  type="submit" name="docClb" class="btn btn btn-success">Ajouter doc</button>
          </div>
          </form>
        </div>
      </div>
      </div>'
      ;
   };
   $html.='</tr></tbody></table>';
   echo $html;
   if (isset($_POST['closeList'])){
     
       $html="";
       echo $html;

   }
 
     }}; 
  //-----------------------------------------------------------TECHNICIEN SUPPORT--------------------------------------------------------- 
  if($_SESSION["role"]=="Technicien support"){
    require_once __DIR__ . '/user/modals.php';
    echo '<form method="post"><div class="container-fluid"><div class="justify-content-center"><div class="btn-group col ">';
   
    echo ' <div class="col-6"><input type="submit" value=" Afficher les projets" class="btn btn-primary btn-lg btn-block" name="viewPjt">
  
   </div>';
   echo'</div></div></div></form>';

 if (isset($_POST['viewPjt'])){
     $projets= ((new Projets)->getAll());
     $html=' <table class="table table-striped  table-dark"> <thead class="thead-light">';
     $html.='  <tr> <th class= "text-center " scope="col">CODE PROJET</th> 
     <th class= "text-center " scope="col">ABREGE PROGE</th>
     <th class= "text-center " scope="col">NOM PROJET</th>
     <th class= "text-center " scope="col">TYPE PROJET</th>
     <th class= "text-center " scope="col">ACTIONS</th>
     <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
     $html.=' </tr> </thead>';
     $html.=' <tbody>';
   foreach($projets as $projet){

      $html.='<tr>';
      $html.='<td class= "text-center align-middle">'.$projet->getCodeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getAbregeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getNomProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getTypeProjet().'</td>';
      $html.=' <td><button  data-id="'.$projet->getCodeProjet().'" data-login="'.$projet->getNomProjet().'" type="submit" name="editPjt" data-bs-target="#modalEditPjt" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>';
     
   };
   $html.='</tr></tbody></table>';
   echo $html;
   if (isset($_POST['closeList'])){
     
       $html="";
       echo $html;

   }
 
     }}; 
 

};
 //-----------------------------------------------------------COMMERCIAL---------------------------------------------------------  
 if($_SESSION["role"]=="Commercial"){
  require_once __DIR__ . '/user/modals.php';
  echo '<form method="post"><div class="container-fluid"><div class="justify-content-center"><div class="btn-group col ">';
  echo '<div class="col-3"><button name="createClt" type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#modalAddClt">
    Ajouter un client
  </button></div>';
  echo '<div class="col-3"><button name="createCntct" type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#modalAddCntct">
    Ajouter un contact client
  </button></div>';
  echo ' <div class="col-3"><input type="submit" value=" Afficher les clients" class="btn btn-primary btn-lg btn-block" name="viewClt"> </div>';
  echo ' <div class="col-3"><input type="submit" value=" Afficher les contacts clients" class="btn btn-primary btn-lg btn-block" name="viewCntct"></div>';

 echo'</div></div></div></form>';

if (isset($_POST['viewClt'])){
   $clients= ((new Clients)->getAll());
   $html=' <table class="table table-striped  table-dark"> <thead class="thead-light">';
   $html.='  <tr> <th class= "text-center " scope="col">ID</th> 
   <th class= "text-center " scope="col">RAISON SOCIALE</th>
   <th class= "text-center " scope="col">ADRESSE</th>
   <th class= "text-center " scope="col">CODE POSTAL</th>
   <th class= "text-center " scope="col">VILLE</th>
   <th class= "text-center " scope="col">CHIFFRE D\'AFFAIRE</th>
   <th class= "text-center " scope="col">EFFECTIF</th>
   <th class= "text-center " scope="col">TELEPHONE</th>
   <th class= "text-center " scope="col">TYPE</th>
   <th class= "text-center " scope="col">NATURE</th>
   <th class= "text-center " scope="col">COMMENTAIRES</th> 
   <th class= "text-center " scope="col">ACTIONS</th>
   <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
   $html.=' </tr> </thead>';
   $html.=' <tbody>';
 foreach($clients as $client){

    $html.='<tr>';
    $html.='<td class= "text-center align-middle">'.$client->getIdclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getRaisonsociale().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getAdresseclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getCodepostal().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getVilleclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getCa().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getEffectif().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getTelephoneclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getTypeclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getNatureclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$client->getCommentaireclient().'</td>';



    $html.=' <td><button  data-id="'.$client->getIdclient().'" data-login="'.$client->getRaisonsociale().'" type="submit" name="editClt" data-bs-target="#modalEditClt" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
    <td><input name="delClt"  value="Supprimer" type="submit" class="btn-sm btn btn-danger test" data-bs-toggle="modal" data-bs-target="#modalDelClt"/></a></td>';
   
 };
 if (isset($_POST['viewCntct'])){
  $contacts= ((new Contacts)->getAll());
  $html=' <table class="table table-striped  table-dark"> <thead class="thead-light">';
  $html.='  <tr> <th class= "text-center " scope="col">ID</th> 
  <th class= "text-center " scope="col">NOM CONTACT</th>
  <th class= "text-center " scope="col">PRENOM CONTACT</th>
  <th class= "text-center " scope="col">TELEPHONE</th>
  <th class= "text-center " scope="col">MAIL</th>
  <th class= "text-center " scope="col">PHOTO</th>
  <th class= "text-center " scope="col">DUREE</th>
  <th class= "text-center " scope="col">ACTIONS</th>
  <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
  $html.=' </tr> </thead>';
  $html.=' <tbody>';
foreach($contacts as $contact){

   $html.='<tr>';
   $html.='<td class= "text-center align-middle">'.$contact->getIdContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getNomContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getPrenomContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getTelContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getEmailContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getPhoto().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getDuree().'</td>';
   



   $html.=' <td><button  data-id="'.$contact->getIdcontact().'" data-login="'.$contact->getNomContact().'" type="submit" name="editCntct" data-bs-target="#modalEditCntct" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
   <td><input name="delCntct"  value="Supprimer" type="submit" class="btn-sm btn btn-danger test" data-bs-toggle="modal" data-bs-target="#modalDelCntct"/></a></td>';
  
};
 $html.='</tr></tbody></table>';
 echo $html;
 if (isset($_POST['closeList'])){
   
     $html="";
     echo $html;

 }

   }}}; 




?>
      
 </main>














