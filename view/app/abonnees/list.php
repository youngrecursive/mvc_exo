<?php


?>

        <table>
          <?php foreach ($abonnees as $abonnee) { ?>
            <tr>
              <td>
                <a href="<?= $view->path('singleabonnee',array($abonnee->id)); ?>">Voir</a>
              </td>
              <td><?= $abonnee->id; ?></td>
              <td><?= $abonnee->nom; ?></td>
              <td><?= $abonnee->prenom; ?></td>
              <td><?= $abonnee->email; ?></td>
              <td><?= $abonnee->age; ?></td>
              <a href="<?= $view->path('updateabonnee',array($abonnee->id)); ?>">Edit</a>
              <a href="<?= $view->path('deleteabonnee',array($abonnee->id)); ?>" onclick="return confirm('Voulez vous vraiment effacer cet article ?');">Delete</a>
            </tr>
          <?php } ?>
        </table>
