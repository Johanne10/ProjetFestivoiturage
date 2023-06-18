<?php
$title = "Modifier festivalier";
ob_start();
?>
    <form action="index.php?action=updateFestivalier" method="post">
        <div class="form-group">
            <label>Nom du festivalier</label>
            <input type="hidden" value="<?= $data->getId_festivalier()?>"  name="id_festivalier" >

            <input type="text" value="<?= $data->getNom_festivalier()?>" class="form-control" name="nom_festivalier">
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text"  value="<?= $data->getPrenom()?>"  class="form-control" name="prenom">
        </div>
        <div class="form-group">
            <label>Date de présence</label>
            <input type="Date"  value="<?= $data->getDate_de_presence()?>"  class="form-control" name="date_de_presence">
        </div>
        <div class="form-group">
            <label>Pseudo</label>
            <input type="text"  value="<?= $data->getPseudo()?>"  class="form-control" name="pseudo">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password"  value="<?= $data->getMot_de_passe()?>"  class="form-control" name="mot_de_passe">
        </div>
        <button type="submit" class="btn btn-primary my-3">Modifier</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
