<form action="" method="post">
    <?php echo $form->label('Abonné'); ?>
    <?php echo $form->select('id_abonne',$abonnees,'nom'); ?>
    <?php echo $form->error('id_abonne'); ?>


    <?php echo $form->label('Produit'); ?>
    <?php echo $form->select('id_product',$products,'titre'); ?>
    <?php echo $form->error('id_product'); ?>


    <?php echo $form->submit(); ?>

</form>
