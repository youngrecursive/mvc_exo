<table>
  <tr>
    <td>Titre</td>
    <td>Référence</td>
    <td>Description</td>
  </tr>
  <?php foreach ($products as $product) { ?>
    <tr>
      <td><?= $product->titre ?></td>
      <td><?= $product->reference ?></td>
      <td><?= $product->description ?></td>
      <td>
        <a href="<?= $view->path('singleproducts',array($product->id)); ?>">Voir</a>
      </td>
      <td>
        <a href="<?= $view->path('updateproducts',array($product->id)); ?>">Modifier</a>
      </td>
      <td>
        <a href="<?= $view->path('deleteproducts',array($product->id)); ?>">Supprimer</a>
      </td>
    </tr>
  <?php } ?>
</table>
