<!-- Button to trigger modal -->

<div >
    <div class="modal-header">

        <h3 id="myModalLabel">Ajouter</h3>
    </div>
    <div class="modal-body">

        <form method="post" action="add.php"  enctype="multipart/form-data">
            <table class="table1">

                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">ID Secteur :</label></td>
                    <td width="30"></td>
                    <td><input list="idliste" type="number" name="idsect" placeholder="ID"  min="1" max="30" required >
                        <datalist id="idliste">
                            <option value="1">Industrial</option>
                            <option value="2">Home</option>
                            <option value="3">Sports</option>
                            <option value="4">Electronics</option>
                            <option value="5">Toys</option>
                            <option value="6">Toys</option>
                            <option value="7">Electronics</option>
                            <option value="8">Baby</option>
                            <option value="9">Kids</option>
                            <option value="10">Shoes</option>
                            <option value="11">Shoes</option>
                            <option value="12">Games</option>
                            <option value="13">Books</option>
                            <option value="14">Clothings</option>
                            <option value="15">Beauty</option>
                            <option value="16">Grocery</option>
                        </datalist> </input>
                    </td>
                </tr>

                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">RaisonSociale</label></td>
                    <td width="30"></td>
                    <td><input type="text" name="raisonsociale" placeholder="Raison Sociale" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">Adresse</label></td>
                    <td width="30"></td>
                    <td><input type="text" name="adresseclient" placeholder="Adresse" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">Code Postal</label></td>
                    <td width="30"></td>
                    <td><input type="text"  name="codepostal" placeholder="Code Postal" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">Ville</label></td>
                    <td width="30"></td>
                    <td><input type="text" name="villeclient" placeholder="Ville" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">CA</label></td>
                    <td width="30"></td>
                    <td><input type="number" name="ca" placeholder="ca" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">effectif</label></td>
                    <td width="30"></td>
                    <td><input type="number" name="effectif" placeholder="effectif" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">Telephone</label></td>
                    <td width="30"></td>
                    <td><input type="text" name="telephoneclient" placeholder="Telephone" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">Type Client</label></td>
                    <td width="30"></td>
                    <td><input type="text" name="typeclient" placeholder="Type Client" required /></td>
                </tr>
                <tr>
                    <td><label style="color:#3a87ad; font-size:18px;">Nature Client</label></td>
                    <td width="30"></td>
                    <td><input type="text" name="natureclient" placeholder="Nature Client" required /></td>
                </tr>
            </table>


    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fermer</button>
        <button type="submit" name="Submit" class="btn btn-primary">Ajouter</button>
    </div>


    </form>
</div>