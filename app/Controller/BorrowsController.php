<?php

// app/Controller/BorrowController.php

namespace App\Controller;

use App\Service\Form;
use App\Service\Validation;
use App\Weblitzer\Controller;
use App\Controller\AbonneesController;
use App\Controller\ProductsController;
use App\Model\BorrowModel;

class BorrowsController extends Controller
{
  public function add()
      {

          $errors = array();
          if(!empty($_POST['submitted'])) {
              $post = $this->cleanXss($_POST);
              $validation = new Validation();
              $errors['titre'] = $validation->textValid($post['titre'], 'titre',2,  15);
              $errors['reference'] = $validation->textValid($post['reference'], 'reference',3,  15);
              $errors['description'] = $validation->textValid($post['description'], 'description',3,  1000);

              if($validation->IsValid($errors)) {

                  // insert +++
                  BorrowsModel::insert($post);

                  // le redirect marche pas aussi +++ ne marche non plus, je le modifie ce week end ;)
                   $this->redirect('listborrows');
              }
          }
          $form = new Form($errors);

          $this->render('app.borrows.add',array(
              'form'  => $form
          ));

      }

}
