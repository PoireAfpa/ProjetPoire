<main>
<?php 

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

                                $users= new Users();
                                $affichage=$nomUser->getAll();
                               
                                        foreach($affichage as $nomUser){
                                       
                                $nomUser->getNomProjet();
                            
                                $arrayNomUser=(array)$nomUser;
                                
                                echo $arrayNomUser["nomprojet"]."</br>";
                              
                                };
                        };
        break;

        case ($_SESSION["role"]=="Secrétaire Technique"):
                echo "  <form action='' method='post'><ul>
                        <li ><a class='nav-item' href='http://localhost/projetPoire/test'><input type='submit' name='modifyClb' class='nav-link'/></a>Ajouter une mission</li>
                        </ul></form>";

                        if (isset($_POST['modifyClb'])){
                                echo "<form  method='post'>
                                   
    
                                    <div class='form-group'>
                                    <label for='passuser'>Pass Utilisateur</label>
                                    <input type='text' class='form-control' name='passuser'>
                                    </div>
                                    <button type='submit' class='btn btn-primary' name='insertMsn' >Créer un collaborateur</button></li> 
                                    </form>
                                    ";
                            };
                            //VOIR TABLE USERS CONTRATS FONCTION
            break;

            case ($_SESSION["role"]=="Commercial"):
                echo "  <form action='' method='post'><ul>
                        <li ><a class='nav-item' href='http://localhost/projetPoire/test'><input type='submit' name='creer' class='nav-link'/></a>Créer un collaborateur</li>
                        <li class='nav-item'><a name='afficher' class='nav-link' href='http://localhost/projetPoire/test'>Afficher tous les collaborateurs</a></li>
                        </ul></form>";
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
                                        
                                        echo $arrayNomProjet["nomprojet"]."</br>";
                                      
                                        };
                                };



                                      
                                      
                                        
            break;
            case ($_SESSION["role"]=="Technicien support"):
                echo "  <form action='' method='post'><ul>
                <button class='btn btn-primary' name='afficherPjt'type='submit'>Afficher les projets</button>
                        </ul></form>";
            break;
        
        }
?>

</main>