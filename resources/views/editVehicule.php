<?php
$title = "Modifier vehicule";
ob_start();
?>
    <form action="index.php?action=updateVehicule" method="post">
        <div class="form-group">
            <label>Type</label>
            <input type="hidden" value="<?= $data->getId_vehicule_festival()?>"  name="id_voiture_festival" >

            <input type="text" value="<?= $data->getType()?>" class="form-control" name="type">
        </div>
        <div class="form-group">
            <label>Nombre de place</label>
            <input type="text"  value="<?= $data->getPlace()?>"  class="form-control" name="place">
        </div>
        <div class="form-group">
            <label>Date d'aller</label>
            <input type="date"  value="<?= $data->getDatealler()?>"  class="form-control" name="datealler">
        </div>
       
        <button type="submit" class="btn btn-primary my-3">Modifier</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
