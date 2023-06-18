<?php

$title = "Festivoiturage";
ob_start();
?>
 
        <a href="index.php?action=createFestival" class="btn btn-primary">Ajouter festival</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Nom</th>
            <th>Localisation</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>
        <?php /** @var app\models\Festival[] $data */
        foreach ($data as $festival): ?>
            <tr>
                <td>F <?= $festival->getId_festival() ?></td>
                <td><?= $festival->getDate() ?></td>
                <td><?= $festival->getNom() ?> </td>
                <td><?= $festival->getLocalisation() ?> </td>
                <td><?= $festival->getPhoto() ?> </td>
                
                <td>
                    <a href="index.php?action=edit&id=<?php echo $festival->getId_festival() ?>" class="btn btn-success btn-sm">Modifier</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer le festival <?= $festival->getNom() ?>');" href="index.php?action=destroyFestival&id_festival=<?php echo $festival->getId_festival() ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
  </div>
  <?php
$content = ob_get_clean();
include_once 'layout.php';


 

