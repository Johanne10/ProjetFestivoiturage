<?php
$title = "Ajouter un festival";
ob_start();
?>
    <form action="index.php?action=storeFestival" method="post">
        <div class="form-group">
            <label>Date</label>
            <input type="date" id="date" class="form-control" name="date" required="required">
        </div>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Veuillez remplir avec votre nom SVP ...">
        </div>
        <div class="form-group">
            <label>Localisation</label>
            <input type="text" class="form-control" name="localisation" id="localisation" placeholder="Veuillez remplir avec la localisation du festival ...">
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">
        </div>
        <button type="submit" class="btn btn-primary my-3">Ajouter</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
?>