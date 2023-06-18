
<?php

$title = "Festivoiturage";
ob_start();
?>
        <a href="index.php?action=createUtilisateur" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M12 5l0 14"></path>
   <path d="M5 12l14 0"></path>
</svg>Ajouter utilisateur</a>
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
                    <a onclick="return confirm('Voulez vous vraiment supprimer l\'utilisateur <?= $utilisateur->getLogin() ?>');" href="index.php?action=destroyUtilisateur&id_utilis=<?php echo $utilisateur->getId_utilis() ?>" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16zm-9.489 5.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" stroke-width="0" fill="currentColor"></path>
   <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
</svg>Supprimer</a>
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

  