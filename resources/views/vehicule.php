
<?php

$title = "Festivoiturage";
ob_start();
?>
       <a href="index.php?action=createVehicule" class="btn btn-primary">Ajouter véhicule</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Nombre de place</th>
            <th>Date d'aller</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>
        <?php /** @var \app\models\Vehicule[] $data */
        foreach ($data as $vehicule): ?>
            <tr>
                <td>V <?= $vehicule->getId_vehicule_festival() ?></td>
                <td><?= $vehicule->getType() ?></td>
                <td><?= $vehicule->getPlace() ?> </td>
                <td><?= $vehicule->getDatealler() ?></td>
               
                <td>
                    <a href="index.php?action=edit&id=<?php echo $vehicule->getId_vehicule_festival() ?>" class="btn btn-success btn-sm">Modifier</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer la vehicule <?= $vehicule->getType() ?>');" href="index.php?action=destroyVehicule&id_vehicule_festival=<?php echo $vehicule->getId_vehicule_festival() ?>" class="btn btn-danger btn-sm">Supprimer</a>
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