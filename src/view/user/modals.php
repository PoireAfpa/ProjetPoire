<?php
use App\core\Dao;
use App\model\Users;
use App\model\Clients;
use App\model\Projets;
use App\model\Contacts;
?>
    

    <!---------------------------------------------RH--------------SECRETAIRE TECHNIQUE---------------------------------------------------->
<!-- Modal add collaborateur-->
<div class="modal fade" id="modalAdd" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddLabel">Ajouter un collaborateur</h5>

      </div>
      <form action="" method="post">
      <div class="modal-body">
       
          <input type='text' class='form-control' placeholder='Login user' name='loginuser'>
          <input type='text' class='form-control' placeholder='Pass user' name='passuser'>
          <div class='form-group'>
          <div class='input-group mb-3'>
          <label class='input-group-text' for='inputGroupSelect01'>Rôles</label>
          <select name='role' class='form-select' id='inputGroupSelect01'>
          <option selected>Choix...</option>
          <option value='Responsable RH'>Responsable RH</option>
          <option value='Commercial'>Commercial</option>
          <option value='Responsable Développement3'>Responsable Développement</option>
          <option value='Technicien support'>Technicien support</option>
          <option value='Secrétaire Technique'>Secrétaire Technique</option>
          </select>
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertClb" class="btn btn-primary">Créer</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
          if (isset($_POST['insertClb'])){
                                $user= new Users;
                                DAO::insertOne($user,$user=[
                                "loginuser"=>$_POST["loginuser"],
                                "passuser"=>$_POST["passuser"],
                                "role"=>$_POST["role"]]);


          }
?>

<!-- Modal edit collaborateur-->


<script> 
$(document).ready(function() {
   $("#modalEdit").modal( {
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on('show', function () {

    });
    $(".test").find('td[id]').on('click', function () {
        debugger;

        $('#modalEdit').html($('<b> Order Id selected: ' + $(this).data('id') + '</b>'));
        $('#modalEdit').modal('show');

  })});

</script>


<div class="modal fade" id="modalEdit" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Modifier un collaborateur</h5>

      </div>
      <div class="modal-body">
      <input type='text' id="login" value="" class='form-control' placeholder='Login user' name='loginuser'>
      <input type='text' class='form-control' placeholder='Pass user' name='passuser'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <button  type="submit" name="docClb" class="btn btn btn-success">Ajouter doc</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delete collaborateur-->
<div class="modal fade" id="modalDel" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel">Supprimer un collaborateur</h5>

      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>
<!-----------------------------------------------------------RESPONSABLE DEVELOPPEMENT---------------------------------------------------------->
<!-- Modal add projet-->
<div class="modal fade" id="modalAddPjt" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddLabel">Ajouter un projet</h5>

      </div>
      <form action="" method="post">
      <div class="modal-body">
       
          <input type='text' class='form-control' placeholder='Nom abrégé' name='abregeprojet'>
          <input type='text' class='form-control' placeholder='Nom projet' name='nomprojet'>
          <input type='text' class='form-control' placeholder='Type projet' name='typeprojet'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertPjt" class="btn btn-primary">Créer</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
          if (isset($_POST['insertPjt'])){
                                $projet= new Projets;
                                DAO::insertOne($projet,$projet=[
                                "abregeprojet"=>$_POST["abregeprojet"],
                                "nomprojet"=>$_POST["nomprojet"],
                                "typeprojet"=>$_POST["typeprojet"]]);


          }
?>

<!-- Modal edit projet-->


<script> 
$(document).ready(function() {
   $("#modalEditPjt").modal( {
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on('show', function () {

    });
    $(".test").find('td[id]').on('click', function () {
        debugger;

        $('#modalEditPjt').html($('<b> Order Id selected: ' + $(this).data('id') + '</b>'));
        $('#modalEditPjt').modal('show');

  })});

</script>


<div class="modal fade" id="modalEditPjt" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Modifier un projet</h5>

      </div>
      <div class="modal-body">
      <input type='text' id="abregeprojet" value="" class='form-control' placeholder='Abrege projet' name='abregeprojet'>
      <input type='text' class='form-control' placeholder='Nom projet' name='nomprojet'>
      <input type='text' class='form-control' placeholder='Type projet' name='typeprojet'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <button  type="submit" name="docPjt" class="btn btn btn-success">Ajouter doc</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delete projet-->
<div class="modal fade" id="modalDelPjt" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel">Supprimer un projet</h5>

      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<!-----------------------------------------------------------COMMERCIAUX---------------------------------------------------------->
<!-----------------------------------------------------------CLIENTS---------------------------------------------------------->
<!-- Modal add client-->
<div class="modal fade" id="modalAddClt" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddLabel">Ajouter un client</h5>

      </div>
      <form action="" method="post">
      <div class="modal-body">
       
          <input type='text' class='form-control' placeholder='Raison sociale' name='raisonsociale'>
          <input type='text' class='form-control' placeholder='Adresse client' name='adresseclient'>
          <input type='text' class='form-control' placeholder='Code postal' name='codepostal'>
          <input type='text' class='form-control' placeholder='Ville' name='ville'>
          <input type='text' class='form-control' placeholder="Chiffre d\'affaires" name='ca'>
          <input type='text' class='form-control' placeholder='Effectif' name='effectif'>
          <input type='text' class='form-control' placeholder='Téléphone' name='telephone'>
          <input type='text' class='form-control' placeholder='Type client' name='typeclient'>
          <input type='text' class='form-control' placeholder='Nature client' name='natureclient'>
          <input type='text' class='form-control' placeholder='Commentaires client' name='commentaireclient'>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertClt" class="btn btn-primary">Créer</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
          if (isset($_POST['insertClt'])){
                                $client= new Clients;
                                DAO::insertOne($client,$client=[
                                "raisonsociale"=>$_POST["raisonsociale"],
                                "adresseclient"=>$_POST["adresseclient"],
                                "codepostal"=>$_POST["codepostal"],
                                "ville"=>$_POST["ville"],
                                "ca"=>$_POST["ca"],
                                "effectif"=>$_POST["effectif"],
                                "telephone"=>$_POST["telephone"],
                                "typeclient"=>$_POST["typeclient"],
                                "natureclient"=>$_POST["natureclient"],
                                "commentaireclient"=>$_POST["commentaireclient"],
                              ]);
          }
?>

<!-- Modal edit client-->


<script> 
$(document).ready(function() {
   $("#modalEditClt").modal( {
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on('show', function () {

    });
    $(".test").find('td[id]').on('click', function () {
        debugger;

        $('#modalEditClt').html($('<b> Order Id selected: ' + $(this).data('id') + '</b>'));
        $('#modalEditClt').modal('show');

  })});

</script>


<div class="modal fade" id="modalEditClt" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Modifier un client</h5>

      </div>
      <div class="modal-body">
      <input type='text' class='form-control' placeholder='Raison sociale' name='raisonsociale'>
          <input type='text' class='form-control' placeholder='Adresse client' name='adresseclient'>
          <input type='text' class='form-control' placeholder='Code postal' name='codepostal'>
          <input type='text' class='form-control' placeholder='Ville' name='ville'>
          <input type='text' class='form-control' placeholder="Chiffre d\'affaires" name='ca'>
          <input type='text' class='form-control' placeholder='Effectif' name='effectif'>
          <input type='text' class='form-control' placeholder='Téléphone' name='telephone'>
          <input type='text' class='form-control' placeholder='Type client' name='typeclient'>
          <input type='text' class='form-control' placeholder='Nature client' name='natureclient'>
          <input type='text' class='form-control' placeholder='Commentaires client' name='commentaireclient'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <button  type="submit" name="docClt" class="btn btn btn-success">Ajouter doc</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delete client-->
<div class="modal fade" id="modalDelClt" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel">Supprimer un client</h5>

      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="delClt"class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>
<!-----------------------------------------------------------CONTACTS---------------------------------------------------------->
<!-- Modal add CONTACT-->
<div class="modal fade" id="modalAddCntct" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddLabel">Ajouter un contact client</h5>

      </div>
      <form action="" method="post">
      <div class="modal-body">
       
          <input type='text' class='form-control' placeholder='Nom contact' name='nomcontact'>
          <input type='text' class='form-control' placeholder='NPrénom contact' name='prenomcontact'>
          <input type='text' class='form-control' placeholder='Téléphone' name='telcontact'>
          <input type='text' class='form-control' placeholder='Mail' name='emailcontact'>
          <input type='text' class='form-control' placeholder='Photo' name='photo'>
          <input type='text' class='form-control' placeholder='Durée' name='duree'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertCntct" class="btn btn-primary">Créer</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
          if (isset($_POST['insertCntct'])){
                                $contact= new Contacts;
                                DAO::insertOne($contact,$contact=[
                                "nomcontact"=>$_POST["nomcontact"],
                                "prenomcontact"=>$_POST["prenomcontact"],
                                "telcontact"=>$_POST["telcontact"],
                                "emailcontact"=>$_POST["emailcontact"],
                                "photo"=>$_POST["photo"],
                                "duree"=>$_POST["duree"]]);


          }
?>

<!-- Modal edit contact-->


<script> 
$(document).ready(function() {
   $("#modalEditCntct").modal( {
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on('show', function () {

    });
    $(".test").find('td[id]').on('click', function () {
        debugger;

        $('#modalEditCntct').html($('<b> Order Id selected: ' + $(this).data('id') + '</b>'));
        $('#modalEditCntct').modal('show');

  })});

</script>


<div class="modal fade" id="modalEditClt" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Modifier un client</h5>

      </div>
      <div class="modal-body">
      <input type='text' class='form-control' placeholder='Nom contact' name='nomcontact'>
          <input type='text' class='form-control' placeholder='NPrénom contact' name='prenomcontact'>
          <input type='text' class='form-control' placeholder='Téléphone' name='telcontact'>
          <input type='text' class='form-control' placeholder='Mail' name='emailcontact'>
          <input type='text' class='form-control' placeholder='Photo' name='photo'>
          <input type='text' class='form-control' placeholder='Durée' name='duree'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delete contact-->
<div class="modal fade" id="modalDelCntct" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel">Supprimer un contact client</h5>

      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="delCntct" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>