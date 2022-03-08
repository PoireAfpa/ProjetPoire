<main>
<?php

use App\model\Clients;
use App\model\Users;
use App\model\Projets;
use App\core\Dao;
switch ( session_status() == PHP_SESSION_ACTIVE)  {
        case ($_SESSION["role"]=="Responsable RH"):
            echo "  <form action='' method='post'>
                        <div class='d-grid gap-2 col-6 mx-auto'>
                        <button type='submit' class='btn btn-primary' name='createClb'>Créer un collaborateur</button>
                        <button class='btn btn-primary' name='afficherClb'type='submit'>Afficher tous les collaborateurs</button>
                        </div>
                        </form>";
                    if (isset($_POST['createClb'])){
                            echo "<form  method='post'>
                                <div class='form-group'>
                                <label for='loginuser'>Nom d'utilisateur</label>
                                <input type='text' class='form-control' name='loginuser'>
                                </div>

                                <div class='form-group'>
                                <label for='passuser'>Pass Utilisateur</label>
                                <input type='text' class='form-control' name='passuser'>
                                </div>

                                <div class='form-group'>
                                <div class='input-group mb-3'>
                                <label class='input-group-text' for='inputGroupSelect01'>Rôles</label>
                                <select name='role' class='form-select' id='inputGroupSelect01'>
                                  <option selected>Choisissez...</option>
                                  <option value='Responsable RH'>Responsable RH</option>
                                  <option value='Commercial'>Commercial</option>
                                  <option value='Responsable Développement'>Responsable Développement</option>
                                  <option value='Technicien support'>Technicien support</option>
                                  <option value='Secrétaire Technique'>Secrétaire Technique</option>
                                </select>
                                </div>
                                </div>
                                <button type='submit' class='btn btn-primary' name='insertClb' >Créer un collaborateur</button></li> 
                                </form>
                                ";
                        };
                        
                        if (isset($_POST['insertClb'])){
                                $user= new Users;
                                DAO::insertOne($user,$user=[
                                "loginuser"=>$_POST["loginuser"],
                                "passuser"=>$_POST["passuser"],
                                "role"=>$_POST["role"]]);
                          
                         
                        };    
                              
                        if (isset($_POST['afficherClb'])){

                                $users= new Users;
                                $affichage=$nomUser->getAll();
                               
                                        foreach($affichage as $nomUser){
                                       
                                $nomUser->getNomProjet();
                            
                                $arrayNomUser=(array)$nomUser;
                                echo "<div class='form-group'>
                                <label for='loginuser'>Nom d'utilisateur</label>
                                <input type='text' class='form-control' placeholder='".$arrayNomUser["passuser"]."' name='loginuser'>
                                </div>";
                                echo "</br>";
                                echo "<div class='form-group'>
                                <label for='loginuser'>Nom d'utilisateur</label>
                                <input type='text' class='form-control' placeholder='".$arrayNomUser["passuser"]."' name='passuser'>
                                </div>";
                                echo " <div class='form-group'>
                                <div class='input-group mb-3'>
                                <label class='input-group-text' for='inputGroupSelect01'>Rôles</label>
                                <select name='role' class='form-select' id='inputGroupSelect01'> <option selected>".$arrayNomUser["role"]. "menu</option>
                                <option value='Responsable RH'>Responsable RH</option>
                                <option value='Commercial'>Commercial</option>
                                <option value='Responsable Développement'>Responsable Développement</option>
                                <option value='Technicien support'>Technicien support</option>
                                <option value='Secrétaire Technique'>Secrétaire Technique</option>
                              </select>
                              </div>
                              </div></br>";
                                echo "<button type='submit' class='btn btn-primary' name='modifyClb' >Créer un collaborateur</button>";
                                };

                        };
                        if (isset($_POST['modifyClb'])){

                                
                                $edit= new Users;
                                DAO::edit($user,$user=[
                                        "loginuser"=>$_POST["loginuser"],
                                        "passuser"=>$_POST["passuser"],
                                        "role"=>$_POST["role"]]);

                        };
        break;

        case ($_SESSION["role"]=="Secrétaire Technique"):
                echo "  <form action='' method='post'><ul>
                        <li ><a class='nav-item' href='http://localhost/projetPoire/test'><input type='submit' name='modifyClb' class='nav-link'/></a>Ajouter une mission</li>
                        </ul></form>";

                               
                        if (isset($_POST['afficherClb'])){

                                $users= new Users;
                                $affichage=$nomUser->getAll();
                               
                                        foreach($affichage as $nomUser){
                                       
                                $nomUser->getNomProjet();
                            
                                $arrayNomUser=(array)$nomUser;
                                echo "<div class='form-group'>
                                <label for='loginuser'>Nom d'utilisateur</label>
                                <input type='text' class='form-control' placeholder='".$arrayNomUser["passuser"]."' name='loginuser'>
                                </div>";
                                echo "</br>";
                                echo "<div class='form-group'>
                                <label for='loginuser'>Nom d'utilisateur</label>
                                <input type='text' class='form-control' placeholder='".$arrayNomUser["passuser"]."' name='passuser'>
                                </div>";
                                echo " <div class='form-group'>
                                <div class='input-group mb-3'>
                                <label class='input-group-text' for='inputGroupSelect01'>Rôles</label>
                                <select name='role' class='form-select' id='inputGroupSelect01'> <option selected>".$arrayNomUser["role"]. "menu</option>
                                <option value='Responsable RH'>Responsable RH</option>
                                <option value='Commercial'>Commercial</option>
                                <option value='Responsable Développement'>Responsable Développement</option>
                                <option value='Technicien support'>Technicien support</option>
                                <option value='Secrétaire Technique'>Secrétaire Technique</option>
                              </select>
                              </div>
                              </div></br>";
                                echo "<button type='submit' class='btn btn-primary' name='modifyClb' >Créer un collaborateur</button>";
                                };

                        };
                        if (isset($_POST['modifyClb'])){

                                
                                $edit= new Users;
                                DAO::edit($user,$user=[
                                        "loginuser"=>$_POST["loginuser"],
                                        "passuser"=>$_POST["passuser"],
                                        "role"=>$_POST["role"]]);

                        };
                            //VOIR TABLE USERS CONTRATS FONCTION
            break;

            case ($_SESSION["role"]=="Commercial"):
                echo "  <form action='' method='post'>
                <div class='d-grid gap-2 col-6 mx-auto'>
                <button type='submit' class='btn btn-primary' name='createClt'>Créer un client</button>
                <button class='btn btn-primary' name='afficherClt'type='submit'>Afficher tous les clients</button>
                </div>
                </form>";
            if (isset($_POST['createClt'])){
                    echo "<form  method='post'>
                        <div class='form-group'>
                        <label for='raisonsociale'>Raison Sociale</label>
                        <input type='text' class='form-control' name='raisonsociale' placeholder='raisonsociale'>
                        </div>

                        <div class='form-group'>
                        <label for='adresseclient'>Adresse Client</label>
                        <input type='text' class='form-control' name='adresseclient' placeholder='adresseclient'>
                        </div>

                        <div class='form-group'>
                        <label for='villeclient'>Ville Client</label>
                        <input type='text' class='form-control' name='villeclient'>
                        </div>
                        <div class='form-group'>
                        <label for='telephoneclient'>Téléphone Client</label>
                        <input type='text' class='form-control' name='telephoneclient' placeholder='telephoneclient'>
                        </div>

                        <div class='form-outline'>
                        <div class='input-group mb-3'>
                        <label class='input-group-text' for='effectif'>Effectif</label>
                        <input type='number' name='effectif' id='effectif' class='form-control'min='1' max=200'/>
                      
                        </div>
                        </div>

                        <div class='form-outline'>
                        <div class='input-group mb-3'>
                        <label class='input-group-text' for='ca'>Chiffre d'affaire</label>
                        <input type='number' name='ca' id='ca' class='form-control'min='1' max=200'/>
                        </div>
                        </div>
                        </form>

                        <div class='form-group'>
                        <label for='typeclient'>Type Client</label>
                        <input type='text' class='form-control' name='typeclient' placeholder='typeclient'>
                        </div>

                        <div class='form-group'>
                        <label for='natureclient'>Nature Client</label>
                        <input type='text' class='form-control' name='natureclient' placeholder='natureclient'>
                        </div>

                        <div class='form-group'>
                        <label for='commentaireclient'>Commentaire Client</label>
                        <textarea type='textarea' class='form-control' name='commentaireclient' placeholder='commentaireclient'></textarea>
                        </div>

                        <div class='form-outline'>
                        <div class='input-group mb-3'>
                        <label class='input-group-text' for='idsect'>Secteur</label>
                        <input type='number' name='idsect' id='idsect' class='form-control'min='1' max='30'/>
                        </div>
                        </div>
                        <button type='submit' class='btn btn-primary' name='insertClt' >Créer un collaborateur</button></li> 
                        </form>
                        ";
                          //VOIR PLACEHOLDER NUMBER
                };
                
                if (isset($_POST['insertClb'])){
                        $client= new Clients;
                        DAO::insertOne($client,$client=[
                        "raisonsociale"=>$_POST["raisonsociale"],
                        "adresseclient"=>$_POST["adresseclient"],
                        "secteur"=>$_POST["secteur"],
                        "idsect"=>$_POST["idsect"],
                        "codepostal"=>$_POST["codepostal"],
                        "ca"=>$_POST["ca"],
                        "effectif"=>$_POST["effectif"],
                        "telephoneclient"=>$_POST["telephoneclient"],
                        "typeclient"=>$_POST["typeclient"],
                        "natureclient"=>$_POST["natureclient"],
                        "commentaireclient"=>$_POST["commentaireclient"]
                ]);
                  
                 
                };    
                      
                if (isset($_POST['afficherClt'])){

                        $client= new Clients;
                        $affichage=$nomClient->getAll();
                       
                                foreach($affichage as $nomClient){
                               
                        $nomClient->getNomClient();
                    
                        $arrayNomClient=(array)$nomClient;
                        echo "<form  method='post'>
                        <div class='form-group'>
                        <label for='raisonsociale'>Raison Sociale</label>
                        <input type='text' class='form-control' name='raisonsociale' placeholder='".$arrayNomClient['raisonsociale']."'>
                        </div>

                        <div class='form-group'>
                        <label for='adresseclient'>Adresse Client</label>
                        <input type='text' class='form-control' name='adresseclient' placeholder='".$arrayNomClient['adresseclient']."'>
                        </div>

                        <div class='form-group'>
                        <label for='villeclient'>Ville Client</label>
                        <input type='text' class='form-control' name='villeclient'>
                        </div>
                        <div class='form-group'>
                        <label for='telephoneclient'>Téléphone Client</label>
                        <input type='text' class='form-control' name='telephoneclient' placeholder='".$arrayNomClient['telephoneclient']."'>
                        </div>

                        <div class='form-outline'>
                        <div class='input-group mb-3'>
                        <label class='input-group-text' for='effectif'>Effectif</label>
                        <input type='number' name='effectif' id='effectif' class='form-control'min='1' max=200'/>
                      
                        </div>
                        </div>

                        <div class='form-outline'>
                        <div class='input-group mb-3'>
                        <label class='input-group-text' for='ca'>Chiffre d'affaire</label>
                        <input type='number' name='ca' id='ca' class='form-control'min='1' max=200'/>
                        </div>
                        </div>
                        </form>

                        <div class='form-group'>
                        <label for='typeclient'>Type Client</label>
                        <input type='text' class='form-control' name='typeclient' placeholder='".$arrayNomClient['typeclient']."'>
                        </div>

                        <div class='form-group'>
                        <label for='natureclient'>Nature Client</label>
                        <input type='text' class='form-control' name='natureclient' placeholder='".$arrayNomClient['natureclient']."'>
                        </div>

                        <div class='form-group'>
                        <label for='commentaireclient'>Commentaire Client</label>
                        <textarea type='textarea' class='form-control' name='commentaireclient' placeholder='".$arrayNomClient['commentaireclient']."'></textarea>
                        </div>

                        <div class='form-outline'>
                        <div class='input-group mb-3'>
                        <label class='input-group-text' for='idsect'>Secteur</label>
                        <input type='number' name='idsect' id='idsect' class='form-control'min='1' max='30'/>
                        </div>
                        </div>
                       
                        </form>
                        ";
                        echo "<button type='submit' class='btn btn-primary' name='modifyClt' >Créer un collaborateur</button>";
                        };

                };
                if (isset($_POST['insertClt'])){
                        $client= new Clients;
                        DAO::edit($client,$client=[
                        "raisonsociale"=>$_POST["raisonsociale"],
                        "adresseclient"=>$_POST["adresseclient"],
                        "secteur"=>$_POST["secteur"],
                        "idsect"=>$_POST["idsect"],
                        "codepostal"=>$_POST["codepostal"],
                        "ca"=>$_POST["ca"],
                        "effectif"=>$_POST["effectif"],
                        "telephoneclient"=>$_POST["telephoneclient"],
                        "typeclient"=>$_POST["typeclient"],
                        "natureclient"=>$_POST["natureclient"],
                        "commentaireclient"=>$_POST["commentaireclient"]
                ]);
        };
            break;
            case ($_SESSION["role"]=="Responsable Développement"):
                echo "  <form action='' method='post'><ul>
                        <button type='submit' class='btn btn-primary' name='createPjt'>Créer un projet</button>
                        <button class='btn btn-primary' name='afficherPjt'type='submit'>Afficher les projets</button>
                        <button class='btn btn-primary' name='afficherClb'type='submit'>Ajouter une mission</button>
                        </ul></form>";
                        if (isset($_POST['createPjt'])){
                                echo "<form  method='post'>
                                    <div class='form-group'>
                                    <label for='nomprojet'>Nom du projet</label>
                                    <input type='textaera' class='form-control' name='nomprojet'>
                                    </div>
    
                                    <div class='form-group'>
                                    <label for='typeprojet'>Type de projet</label>
                                    <input type='text' class='form-control' name='typeprojet'>
                                    </div>

                                    <div class='form-group'>
                                    <label for='abregeprojet'>Nom abrégé du projet</label>
                                    <input type='text' class='form-control' name='abregeprojet'>
                                    </div>
    
                                    <button type='submit' class='btn btn-primary' name='insertPjt' >Créer un projet</button></li> 
                                    </form>
                                    ";
                                };
                                  
                      
                                if (isset($_POST['insertPjt'])){
                                        $projet= new Projets;
                                        DAO::insertOne($projet,$projet=[
                                        "nomprojet"=>$_POST["nomprojet"],
                                        "typeprojet"=>$_POST["typeprojet"],
                                        "abregeprojet"=>$_POST["abregeprojet"]]);
                                };

                                if (isset($_POST['afficherPjt'])){

                                        $projects= new Projets();
                                        $affichage=$projects->getAll();
                                       
                                                foreach($affichage as $nomProjet){
                                               
                                        $nomProjet->getNomProjet();
                                    
                                        $arrayNomProjet=(array)$nomProjet;
                                        echo "<form  method='post'>
                                    <div class='form-group'>
                                    <label for='nomprojet'>Nom du projet</label>
                                    <input type='textaera' class='form-control' name='nomprojet' placeholder='".$arrayNomProjet['nomprojet']."'>
                                    </div>
    
                                    <div class='form-group'>
                                    <label for='typeprojet'>Type de projet</label>
                                    <input type='text' class='form-control' name='typeprojet' placeholder='".$arrayNomProjet['typeprojet']."'>
                                    </div>

                                    <div class='form-group'>
                                    <label for='abregeprojet'>Nom abrégé du projet</label>
                                    <input type='text' class='form-control' name='abregeprojet' placeholder='".$arrayNomProjet['abregeprojet']."'>
                                    </div>
    
                                    <button type='submit' class='btn btn-primary' name='modifyPjt' >Créer un projet</button></li> 
                                    </form>
                                    ";
                                       
                                      
                                        };
                                };



                                      
                                      
                                        
            break;
            case ($_SESSION["role"]=="Technicien support"):
                echo "  <form action='' method='post'><ul>
                <button class='btn btn-primary' name='afficherPjt'type='submit'>Afficher les projets</button>
                        </ul></form>";
                        if (isset($_POST['createPjt'])){
                                echo "<form  method='post'>
                                    <div class='form-group'>
                                    <label for='nomprojet'>Nom du projet</label>
                                    <input type='textaera' class='form-control' name='nomprojet'>
                                    </div>
    
                                    <div class='form-group'>
                                    <label for='typeprojet'>Type de projet</label>
                                    <input type='text' class='form-control' name='typeprojet'>
                                    </div>

                                    <div class='form-group'>
                                    <label for='abregeprojet'>Nom abrégé du projet</label>
                                    <input type='text' class='form-control' name='abregeprojet'>
                                    </div>
    
                                    <button type='submit' class='btn btn-primary' name='insertPjt' >Créer un projet</button></li> 
                                    </form>
                                    ";
                                };
                                  
                      
                                if (isset($_POST['insertPjt'])){
                                        $projet= new Projets;
                                        DAO::insertOne($projet,$projet=[
                                        "nomprojet"=>$_POST["nomprojet"],
                                        "typeprojet"=>$_POST["typeprojet"],
                                        "abregeprojet"=>$_POST["abregeprojet"]]);
                                };

                                if (isset($_POST['afficherPjt'])){

                                        $projects= new Projets();
                                        $affichage=$projects->getAll();
                                       
                                                foreach($affichage as $nomProjet){
                                               
                                        $nomProjet->getNomProjet();
                                    
                                        $arrayNomProjet=(array)$nomProjet;
                                        echo "<form  method='post'>
                                    <div class='form-group'>
                                    <label for='nomprojet'>Nom du projet</label>
                                    <input type='textaera' class='form-control' name='nomprojet' placeholder='".$arrayNomProjet['nomprojet']."'>
                                    </div>
    
                                    <div class='form-group'>
                                    <label for='typeprojet'>Type de projet</label>
                                    <input type='text' class='form-control' name='typeprojet' placeholder='".$arrayNomProjet['typeprojet']."'>
                                    </div>

                                    <div class='form-group'>
                                    <label for='abregeprojet'>Nom abrégé du projet</label>
                                    <input type='text' class='form-control' name='abregeprojet' placeholder='".$arrayNomProjet['abregeprojet']."'>
                                    </div>
    
                                    <button type='submit' class='btn btn-primary' name='modifyPjt' >Créer un projet</button></li> 
                                    </form>
                                    ";
                                       
                                      
                                        };
                                };
            break;
        
        }
?>

</main>