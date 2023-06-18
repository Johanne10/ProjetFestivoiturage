<?php
$title = "Ajouter un festivalier";
ob_start();
?>
    <form action="index.php?action=storeFestivalier" method="post">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" id="nom_festivalier" class="form-control" name="nom_festivalier" required="required" placeholder="Veuillez remplir avec votre nom SVP ...">
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Veuillez remplir avec votre prénom SVP ...">
        </div>
        <div class="form-group">
            <label>Date de présence</label>
            <input type="date" class="form-control" name="date_de_presence" id="date_de_presence">
        </div>
        <div class="form-group">
            <label>Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Veuillez remplir avec votre pseudo SVP ...">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe">
        </div>
        <button type="submit" class="btn btn-primary my-3">Ajouter</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
