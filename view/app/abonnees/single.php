<?php // view/app/article/single.php ?>

<table>
    <thead>
    <tr>
        <th>id</th>
        <th>prenom</th>
        <th>nom</th>
        <th>email</th>
        <th>created_at</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $abonnee->id; ?></td>
            <td><?= $abonnee->prenom; ?></td>
            <td><?= $abonnee->nom ?></td>
            <td><?= $abonnee->email ?></td>
            <td><?= date('d/m/Y',strtotime($abonnee->created_at)); ?></td>
        </tr>
    </tbody>
</table>
