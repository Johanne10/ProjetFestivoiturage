<?php
$title = "Ajouter un véhicule";
ob_start();
?>
    <form action="index.php?action=storeVehicule" method="post">
        <div class="form-group">
            <label>Type</label>
            <input type="text" id="type" class="form-control" name="type" required="required" placeholder="Veuillez saisir le type du véhicule ...">
        </div>
        <div class="form-group">
            <label>Nombre de place</label>
            <input type="text" class="form-control" name="place" id="place" placeholder="Veuillez remplir le nombre de place SVP ...">
        </div>
        <div class="form-group">
            <label>Date d'aller</label>
            <input type="date" class="form-control" name="datealler" id="datealler" placeholder="Veuillez remplir avec la date d'aller ...">
        </div>
        
        <button type="submit" class="btn btn-primary my-3">Ajouter</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
