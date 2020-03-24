<?php // view/app/article/add.php ?>


<form action="" method="post">

        <?php echo $form->label('nom'); ?>
        <?php echo $form->input('nom',$abonnee->nom); ?>
        <?php echo $form->error('nom'); ?>

        <?php echo $form->label('prenom'); ?>
        <?php echo $form->input('prenom',$abonnee->prenom); ?>
        <?php echo $form->error('prenom'); ?>


        <?php echo $form->label('email'); ?>
        <?php echo $form->textarea('email',$abonnee->email); ?>
        <?php echo $form->error('email'); ?>

        <?php echo $form->label('age'); ?>
        <?php echo $form->textarea('age',$abonnee->age); ?>
        <?php echo $form->error('age'); ?>

        <?php echo $form->submit(); ?>

</form>
