
<?php

$title = "Festivoiturage";
ob_start();
?>
        <a href="index.php?action=create" class="btn btn-primary">Ajouter utilisateur</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>login</th>
            <th>Mot de passe</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>
        <?php /** @var \app\models\Utilisateur[] $data */
        foreach ($data as $utilisateur): ?>
            <tr>
                <td><?= $utilisateur->getId_utilis() ?></td>
                <td><?= $utilisateur->getLogin() ?></td>
                <td><?= $utilisateur->getMdp() ?></td>
                <td><?= $utilisateur->getRole() ?> $</td>
                
               
                <td>
                    <a href="index.php?action=edit&id=<?php echo $utilisateur->getId_utilis() ?>" class="btn btn-success btn-sm">Modifier</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer l'utilisateur <?= $utilisateur->getLogin() ?>');" href="index.php?action=destroy&id=<?php echo $utilisateur->getId_utilis() ?>" class="btn btn-danger btn-sm">Supprimer</a>
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

  