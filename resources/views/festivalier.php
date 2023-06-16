<?php

$title = "Festivoiturage";

ob_start();
?>
        <a href="index.php?action=create" class="btn btn-primary">Ajouter festivalier</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de présence</th>
            <th>Pseudo</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>
        <?php /** @var \app\models\Festivalier[] $data */
        foreach ($data as $festivalier): ?>
            <tr>
                <td><?= $festivalier->getId_festivalier() ?></td>
                <td><?= $festivalier->getNom_festivalier() ?></td>
                <td><?= $festivalier->getPrenom() ?> </td>
                <td><?= $festivalier->getDate_de_presence() ?></td>
                <td><?= $festivalier->getPseudo() ?> </td>
                <td><?= $festivalier->getMot_de_passe() ?> </td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $festivalier->getId_festivalier() ?>" class="btn btn-success btn-sm">Modifier</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer le festivalier <?= $festivalier->getPrenom() ?>');" href="index.php?action=destroy&id=<?php echo $festivalier->getId_festivalier() ?>" class="btn btn-danger btn-sm">Supprimer</a>
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


   