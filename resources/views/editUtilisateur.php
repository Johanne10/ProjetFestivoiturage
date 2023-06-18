<?php
$title = "Modifier utilisateur";
ob_start();
?>
    <form action="index.php?action=updateUtilisateur" method="post">
        <div class="form-group">
            <label>Login</label>
            <input type="hidden" value="<?= $data->getId_utilis()?>"  name="id_utilis" >

            <input type="text" value="<?= $data->getLogin()?>" class="form-control" name="login">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password"  value="<?= $data->getMdp()?>"  class="form-control" name="mdp">
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text"  value="<?= $data->getRole()?>"  class="form-control" name="role">
        </div>
       
        <button type="submit" class="btn btn-primary my-3">Modifier</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
