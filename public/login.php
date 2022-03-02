 
 <h1 class="text-center">Veuillez vous connecter</h1>
 <div class="container">
     <!-- partie pour afficher un message d'erreur-->
   <?php if (isset($error) && !empty($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
   </div>
    <?php endif; ?>


    <form action="" method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="login" name="login">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
   </div>