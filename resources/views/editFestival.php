<?php
$title = "Modifier festival";
ob_start();
?>
    <form action="index.php?action=updateFestival" method="post">
        <div class="form-group">
            <label>Date</label>
            <input type="hidden" value="<?= $data->getId_festival()?>"  name="id_festival" >

            <input type="date" value="<?= $data->getDate()?>" class="form-control" name="date">
        </div>
        <div class="form-group">
            <label>Nom du festival</label>
            <input type="text"  value="<?= $data->getNom()?>"  class="form-control" name="nom">
        </div>
        <div class="form-group">
            <label>Localisation</label>
            <input type="text"  value="<?= $data->getLocalisation()?>"  class="form-control" name="localisation">
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">
        </div>
        <button type="submit" class="btn btn-primary my-3">Modifier</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
