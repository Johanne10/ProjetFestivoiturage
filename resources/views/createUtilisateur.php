<?php
$title = "Ajouter un utilisateur";
ob_start();
?>
    <form action="index.php?action=storeUtilisateur" method="post">
        <div class="form-group">
            <label>Login</label>
            <input type="text" id="login" class="form-control" name="login" required="required" placeholder="Veuillez saisir le login...">
        </div>
        <div class="form-group">
            <label>Mot de passe </label>
            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Veuillez saisir le mot de passe SVP ...">
        </div>
        <div class="form-group">
            <label>Role</label> 
            <select name="role" id="role" class="selectpicker">
                          <option value="">--Choississer un role--</option>
                          <option value="Admin">Admin</option>
                          <option value="Utilisateur lambda">Utilisateur lambda</option>
                    </select>        </div>
        
        <button type="submit" class="btn btn-primary my-3">Ajouter</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
