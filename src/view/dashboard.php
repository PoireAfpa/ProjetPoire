<main>
<?php


use App\model\Users;
use App\model\Clients;
use App\model\Projets;
use App\model\Contacts;

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
                    <th class= "text-center " colspan="2" scope="col">ACTIONS</th>
                    <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
                    $html.=' </tr> </thead>';
                    $html.=' <tbody>';
                    $modalEdit="";
                    $modalDelete="";
                    $modalDoc="";
                    foreach($collaborateurs as $collaborateur){
                     
                     $html.='<tr>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getIdUser().'</td>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getLoginUser().'</td>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getPassUser().'</td>';
                     $html.='<td class= "text-center align-middle">'.$collaborateur->getRole().'</td>';
                     $html.=' <td><button  data-id="'.$collaborateur->getIdUser().'" data-login="'.$collaborateur->getLoginUser().'" data-pas="'.$collaborateur->getRole().'" type="submit" name="editClb" data-bs-target="#modalEdit'.$collaborateur->getIdUser().'" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
                     <td><input name="docClb"  value="Add document" type="submit" class="btn-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDoc'.$collaborateur->getIdUser().'"/></a></td>
                     <td><input name="delClb"  value="Supprimer" type="submit" class="btn-sm btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDel'.$collaborateur->getIdUser().'"/></a></td>';
                     // Modal edit collaborateur//
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
                     // Modal delete collaborateur//
                     $modalDelete.='
                     <div class="modal fade" id="modalDel'.$collaborateur->getIdUser().'" tabindex="-1" >
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="modalDelLabel">Supprimer un collaborateur</h5>
                     
                           </div>
                           <div class="modal-body">
                           <form action="'.BASE_URI.'/dahsboard/user/delete/'.$collaborateur->getIdUser().'" method="post">
                         
                          <div> Etes vous sûr de vouloir supprimer'.$collaborateur->getLoginUser().'?
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                             <button type="submit" class="btn btn-danger">Supprimer</button>
                           </div>
                           </form>
                         </div>
                       </div>
                       </div>
                     </div>';
                       // Modal add doc collaborateur//
                       $modalDoc.='
                       <div class="modal fade" id="modalDoc'.$collaborateur->getIdUser().'" tabindex="-1" >
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="modalDocLabel">Ajouter un document</h5>
                              </div>
                                    <form action="'.BASE_URI.'/dahsboard/user/addDoc/'.$collaborateur->getIdUser().'" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <div class="input-group">
                                                  <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="mon_fichier" id="addDoc">
                                                    <label class="custom-file-label" for="addDoc">Choisissez un document</label></div>
                                          </div>
                                        </div>
                                              <div class="modal-footer">
                                              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                                              <button type="submit" name="addDoc" class="btn btn-primary">Ajouter</button>
                                              </div>
                                    </form>
                                    
                           </div>
                         </div>
                       </div>';
                  };
                  
                  $html.='</tr></tbody></table>';
                  echo $html;
                  echo $modalEdit;
                  echo $modalDelete;
                  echo $modalDoc;
                  if (isset($_POST['closeList'])){
                        $html="";
                      echo $html;

                  }
                  

                
                    }}; 
  //-----------------------------------------------------------SECRETAIRE TECHNIQUE-------------------------------------------------------------
 
              

        if($_SESSION["role"]=="Secrétaire Technique"){
                  require_once __DIR__ . '/user/modals.php';
                  echo '<form method="post"><div class="container-fluid"><div class="justify-content-center">';
                  echo '<div class="col-6"><input type="submit" value=" Afficher tous collaborateurs" class="btn btn-primary btn-lg btn-block" name="viewClb"> </div>';
                  echo'</div></div></form>';
              
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
                    $html.=' <td class= "text-center" colspan="2"><button  data-id="'.$collaborateur->getIdUser().'" data-login="'.$collaborateur->getLoginUser().'" data-pas="'.$collaborateur->getRole().'" type="submit" name="editClb" data-bs-target="#modalEdit'.$collaborateur->getIdUser().'" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>';
                       // Modal edit collaborateur//
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
                  
                     $html="";
                     echo $html;
                  

                 }

               }};



  //-----------------------------------------------------------RESPONSABLE DEVELOPPEMENT---------------------------------------------------------- 
  if($_SESSION["role"]=="Responsable Développement"){
    require_once __DIR__ . '/user/modals.php';
    echo '<form method="post"><div class="container-fluid"><div class="justify-content-center"><div class="btn-group col ">';
    echo '<div class="col-4"><button name="createPjt" type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#modalAddPjt">
      Ajouter un projet
    </button></div>';
    echo ' <div class="col-4"><input type="submit" value=" Afficher les projets" class="btn btn-primary btn-lg btn-block" name="viewPjt">
   </div>';
   echo ' <div class="col-4"><input type="submit" value=" Afficher tous collaborateurs" class="btn btn-primary btn-lg btn-block" name="viewClb">         
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
    $modalDelete="";
    $modalDoc="";
    foreach($collaborateurs as $collaborateur){
     
     $html.='<tr>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getIdUser().'</td>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getLoginUser().'</td>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getPassUser().'</td>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getRole().'</td>';
     $html.='<td><input name="docClb"  value="Add document" type="submit" class="btn-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDoc'.$collaborateur->getIdUser().'"/></a></td>';
         // Modal add doc collaborateur//
         $modalDoc.='
         <div class="modal fade" id="modalDoc'.$collaborateur->getIdUser().'" tabindex="-1" >
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="modalDocLabel">Ajouter un document</h5>
         
               </div>
               <form action="'.BASE_URI.'/dahsboard/user/addDoc/'.$collaborateur->getIdUser().'" method="post" enctype="multipart/form-data>
               <div class="modal-body">
                <div class="input-group">
               <div class="custom-file">
                 <input type="file" class="custom-file-input" name="mon_fichier" id="addDoc">
                 <label class="custom-file-label" for="addDoc">Choisissez un document</label>
               </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                 <button type="submit" name="addFile" class="btn btn-primary">Ajouter</button>
               </div>
               </form>
             </div>
           </div>
         </div>';
    }
  
    $html.='</tr></tbody></table>';
    echo $html;
    echo $modalEdit;
    echo $modalDelete;
    echo $modalDoc;
    if (isset($_POST['closeList'])){
      
        $html="";
        echo $html;
 
    }
   };
  
  
  
  
 
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
     $modalDelete="";
     $modalDoc="";
   foreach($projets as $projet){

      $html.='<tr>';
      $html.='<td class= "text-center align-middle">'.$projet->getCodeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getAbregeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getNomProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getTypeProjet().'</td>';
      $html.=' <td><button type="submit" name="editPjt" data-bs-target="#modalEditPjt'.$projet->getCodeProjet().'" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
      <td><input name="delPjt"  value="Supprimer" type="submit" class="btn-sm btn btn-danger test" data-bs-toggle="modal" data-bs-target="#modalDelPjt"/></a></td>';
       // Modal edit projet//
      $modalEdit.= '
      <div class="modal fade" id="modalEditPjt'.$projet->getCodeProjet().'" tabindex="-1" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Modifier un projet</h5>
      
          </div>
          <form action="'.BASE_URI.'/dahsboard/projet/edit/'.$projet->getCodeProjet().'" method="post">
         <div class="modal-body">
          <input type="text" value="'.$projet->getAbregeProjet().'" class="form-control" name="abregeprojet">
          <input type="text" value="'.$projet->getNomProjet().'" class="form-control" name="nomprojet">
          <input type="text" value="'.$projet->getTypeProjet().'"class="form-control" name="typeprojet">
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
     // Modal delete projet//
     $modalDelete.='
     <div class="modal fade" id="modalDel'.$projet->getCodeProjet().'" tabindex="-1" >
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="modalDelLabel">Supprimer un collaborateur</h5>
     
           </div>
           <form action="'.BASE_URI.'/dahsboard/projet/delete/'.$projet->getNomProjet().'" method="post">
           <div class="modal-body">
          <div> Etes vous sûr de vouloir supprimer'.$projet->getNomProjet().'?
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
             <button type="submit" class="btn btn-danger">Supprimer</button>
           </div>
           </form>
         </div>
       </div>
     </div>'; 
  };
  
   $html.='</tr></tbody></table>';
   echo $html;
   echo $modalEdit;
   echo $modalDelete;
   echo $modalDoc;
   if (isset($_POST['closeList'])){
     
       $html="";
       echo $html;

   }
 
     }};
  //-----------------------------------------------------------TECHNICIEN SUPPORT--------------------------------------------------------- 
  if($_SESSION["role"]=="Technicien support"){
    require_once __DIR__ . '/user/modals.php';
    echo '<form method="post"><div class="container-fluid"><div class="justify-content-center"><div class="btn-group col ">';
    echo ' <div class="col-4"><input type="submit" value=" Afficher tous collaborateurs" class="btn btn-primary btn-lg btn-block" name="viewClb">         
   </div>';
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
     $modalDelete="";
     $modalDoc="";
   foreach($projets as $projet){

      $html.='<tr>';
      $html.='<td class= "text-center align-middle">'.$projet->getCodeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getAbregeProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getNomProjet().'</td>';
      $html.='<td class= "text-center align-middle">'.$projet->getTypeProjet().'</td>';
      $html.=' <td><button  data-id="'.$projet->getCodeProjet().'" data-login="'.$projet->getNomProjet().'" type="submit" name="editPjt" data-bs-target="#modalEditPjt'.$projet->getCodeProjet().'" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>';
        // Modal edit projet//
        $modalEdit.= '
        <div class="modal fade" id="modalEditPjt'.$projet->getCodeProjet().'" tabindex="-1" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditLabel">Modifier un projet</h5>
        
            </div>
            <form action="'.BASE_URI.'/dahsboard/projet/edit/'.$projet->getCodeProjet().'" method="post">
           <div class="modal-body">
            <input type="text" value="'.$projet->getAbregeProjet().'" class="form-control" name="abregeprojet">
            <input type="text" value="'.$projet->getNomProjet().'" class="form-control" name="nomprojet">
            <input type="text" value="'.$projet->getTypeProjet().'"class="form-control" name="typeprojet">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Modifier</button>
              <button  type="submit" name="docClb" class="btn btn btn-success">Ajouter doc</button>
            </div>
            </form>
          </div>
        </div>
        </div>';
   }
   $html.='</tr></tbody></table>';
   echo $html;
   echo $modalEdit;
   echo $modalDelete;
   echo $modalDoc;
   if (isset($_POST['closeList'])){
     
       $html="";
       echo $html;

   }
  };
     
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
    $modalDelete="";
    $modalDoc="";
    foreach($collaborateurs as $collaborateur){
     
     $html.='<tr>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getIdUser().'</td>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getLoginUser().'</td>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getPassUser().'</td>';
     $html.='<td class= "text-center align-middle">'.$collaborateur->getRole().'</td>';
     $html.='
     <td><input name="docClb"  value="Add document" type="submit" class="btn-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDoc'.$collaborateur->getIdUser().'"/></td>';
         // Modal add doc collaborateur//
         $modalDoc.='
         <div class="modal fade" id="modalDoc'.$collaborateur->getIdUser().'" tabindex="-1" >
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="modalDocLabel">Ajouter un document</h5>
         
               </div>
               <form action="'.BASE_URI.'/dahsboard/user/addDoc/'.$collaborateur->getIdUser().'" method="post" enctype="multipart/form-data>
               <div class="modal-body">
                <div class="input-group">
               <div class="custom-file">
                 <input type="file" class="custom-file-input" name="mon_fichier" id="addDoc">
                 <label class="custom-file-label" for="addDoc">Choisissez un document</label>
               </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                 <button type="submit" name="addFile" class="btn btn-primary">Ajouter</button>
               </div>
               </form>
             </div>
           </div>
         </div>';
    };
   $html.='</tr></tbody></table>';
   echo $html;
   echo $modalEdit;
   echo $modalDelete;
   echo $modalDoc;
   if (isset($_POST['closeList'])){
     
       $html="";
       echo $html;

   }
 
     }}; 
 


 //-----------------------------------------------------------COMMERCIAL---------------------------------------------------------  
 //-----------------------------------------------------------CLIENTS---------------------------------------------------------  
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
   $customers= ((new Clients)->getAll());
   $html=' <table class="table table-striped  table-dark">
   <thead class="thead-light">';
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
   <th class= "text-center " colspan="3" scope="col">ACTIONS</th>
   <th><form method="post" ><input  type="submit" value="FERMER" name="closeList" class="btn-sm btn btn-primary"/></form></th>';
   $html.=' </tr> </thead>';
   $html.=' <tbody>';
   $modalEdit="";
   $modalDoc="";
   $modalDelete="";
 foreach($customers as $customer){

    $html.='<tr>';
    $html.='<td class= "text-center align-middle">'.$customer->getIdclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getRaisonsociale().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getAdresseclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getCodepostal().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getVilleclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getCa().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getEffectif().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getTelephoneclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getTypeclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getNatureclient().'</td>';
    $html.='<td class= "text-center align-middle">'.$customer->getCommentaireclient().'</td>';
    $html.=' <td><button type="submit" name="editClt" data-bs-target="#modalEditClt'.$customer->getIdclient().'" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
    <td><input name="delClt"  value="Supprimer" type="submit" class="btn-sm btn btn-danger test" data-bs-toggle="modal" data-bs-target="#modalDelClt'.$customer->getIdclient().'"/></a></td>';
    $html.='<td><input name="docClt"  value="Add document" type="submit" class="btn-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDocClt'.$customer->getIdclient().'"/></a></td>';
    // Modal add doc client//
     $modalDoc.='
     <div class="modal fade" id="modalDocClt'.$customer->getIdclient().'" tabindex="-1" >
       <div class="modal-dialog">
         <div class="modal-content">
                  <form action="'.BASE_URI.'/dahsboard/client/addDoc/'.$customer->getIdclient().'" method="post" enctype="multipart/form-data>
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalDocLabel">Ajouter un document</h5>
              
                    </div>
                    
                    <div class="modal-body">
                      <div class="input-group">
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" name="mon_fichier" id="addDoc">
                      <label class="custom-file-label" for="addDoc">Choisissez un document</label>
                      </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" name="addFile" class="btn btn-primary">Ajouter</button>
                    </div>
                  </form>
         </div>
       </div>
     </div>';
      /* Modal edit client*/
   $modalEdit.='
   <div class="modal fade" id="modalEditClt'.$customer->getIdclient().'" tabindex="-1" >
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="modalEditLabel">Modifier un client</h5>
   
         </div>
         <form action="'.BASE_URI.'/dahsboard/client/edit/'.$customer->getIdclient().'" method="post">
         <div class="modal-body">
              <input type="text" class="form-control" value="'.$customer->getRaisonsociale().'" placeholder="Raison sociale" name="raisonsociale">
              <input type="text" class="form-control" value="'.$customer->getAdresseclient().'"  placeholder="Adresse client" name="adresseclient">
              <input type="text" class="form-control" value="'.$customer->getCodepostal().'"  placeholder="Code postal" name="codepostal">
              <input type="text" class="form-control" value="'.$customer->getVilleclient().'"  placeholder="Ville" name="ville">
              <input type="text" class="form-control" value="'.$customer->getCa().'"  placeholder="Chiffre d\"affaires" name="ca">
              <input type="text" class="form-control" value="'.$customer->getEffectif().'"  placeholder="Effectif" name="effectif">
              <input type="text" class="form-control" value="'.$customer->getTelephoneclient().'" placeholder="Téléphone" name="telephone">
              <input type="text" class="form-control" value="'.$customer->getTypeclient().'" placeholder="Type client" name="typeclient">
              <input type="text" class="form-control" value="'.$customer->getNatureclient().'" placeholder="Nature client" name="natureclient">
              <input type="text" class="form-control" value="'.$customer->getCommentaireclient().'" placeholder="Commentaires client" name="commentaireclient">
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Modifier</button>
           <button  type="submit" name="docClt" class="btn btn btn-success">Ajouter doc</button>
         </div>
         </form>
       </div>
     </div>
   </div>';
    /* Modal delete client*/
  $modalDelete.='
   <div class="modal fade" id="modalDelClt'.$customer->getIdclient().'" tabindex="-1" >
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="modalDelLabel">Supprimer un collaborateur</h5>
   
         </div>
         <form action="'.BASE_URI.'/dahsboard/client/delete/'.$customer->getIdclient().'" method="post">
         <div class="modal-body">
        <div> Etes vous sûr de vouloir supprimer'.$customer->getRaisonsociale().'?
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
           <button type="submit" class="btn btn-danger">Supprimer</button>
         </div>
         </form>
       </div>
     </div>
   </div>';
 };
   $html.='</tr></tbody></table>';
   echo $html;
   echo $modalEdit;
   echo $modalDelete;
   if (isset($_POST['closeList'])){
       $html="";
       echo $html;

   }
 };
 //-----------------------------------------------------------COMMERCIAL---------------------------------------------------------  
 //-----------------------------------------------------------CONTACTS---------------------------------------------------------  
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
  $modalDelete="";
  $modalDoc="";
  $modalEdit="";
foreach($contacts as $contact){

   $html.='<tr>';
   $html.='<td class= "text-center align-middle">'.$contact->getIdContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getNomContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getPrenomContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getTelContact().'</td>';
   $html.='<td class= "text-center align-middle">'.$contact->getEmailContact().'</td>';
   $html.='<td class= "text-center align-middle"><img src='.$contact->getPhoto().'></td>';
   $html.='<td class= "text-center align-middle">'.$contact->getDuree().'</td>';
   $html.=' <td><button  data-id="'.$contact->getIdcontact().'" data-login="'.$contact->getNomContact().'" type="submit" name="editCntct" data-bs-target="#modalEditCntct'.$contact->getIdContact().'" data-bs-toggle="modal" class="btn-sm btn btn-success">Modifier</button></td>
   <td><input name="delCntct"  value="Supprimer" type="submit" class="btn-sm btn btn-danger test" data-bs-toggle="modal" data-bs-target="#modalDelCntct"/></a></td>';
   /* Modal edit contact*/
   $modalEdit.='
   <div class="modal fade" id="modalEditCntct"'.$contact->getIdContact().' tabindex="-1" >
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="modalEditLabel">Modifier un client</h5>
   
         </div>
         <form action="'.BASE_URI.'/dahsboard/contact/edit/'.$contact->getIdContact().'" method="post">
         <div class="modal-body">
                  <input type="text" class="form-control" value="'.$contact->getNomContact().'" placeholder="Nom contact" name="nomcontact">
                  <input type="text" class="form-control" value="'.$contact->getPrenomContact().'" placeholder="Prénom contact" name="prenomcontact">
                  <input type="text" class="form-control" value="'.$contact->getTelContact().'" placeholder="Téléphone" name="telcontact">
                  <input type="text" class="form-control" value="'.$contact->getEmailContact().'" placeholder="Mail" name="emailcontact">
                  <input type="text" class="form-control" value="'.$contact->getPhoto().'" placeholder="Photo" name="photo">
                  <input type="text" class="form-control" value="'.$contact->getDuree().'" placeholder="Durée" name="duree">
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Modifier</button>
           <button  type="submit" name="docCntct" class="btn btn btn-success">Ajouter doc</button>
         </div>
         </form>
       </div>
     </div>
   </div>';
    /* Modal delete contact*/
   $modalDelete.='
   <div class="modal fade" id="modalDel'.$contact->getIdContact().'" tabindex="-1" >
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="modalDelLabel">Supprimer un collaborateur</h5>
   
         </div>
         <form action="'.BASE_URI.'/dahsboard/contact/delete/'.$contact->getIdContact().'" method="post">
         <div class="modal-body">
        <div> Etes vous sûr de vouloir supprimer'.$contact->getNomContact().'?
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
           <button type="submit" class="btn btn-danger">Supprimer</button>
         </div>
         </form>
       </div>
     </div>
   </div>';
}
 $html.='</tr></tbody></table>';
 echo $html;
 echo $modalEdit;
 echo $modalDelete;
 if (isset($_POST['closeList'])){
   
     $html="";
     echo $html;

 };
 };
   
  };

}; 


?>
      
 </main>
