<?php

// app/Controller/ArticleController

namespace App\Controller;

use App\Service\Form;
use App\Service\Validation;
use App\Weblitzer\Controller;
use App\Model\AbonneeModel;

/**
 *
 */
class AbonneesController extends Controller
{
    public function index()
    {


      // aller chercher tous les articles
      $abonnees = AbonneeModel::all();
      //$this->debug($articles);
      $this->render('app.abonnees.list',array(
          // faire passer les articles à la vue dans view/app/article/listing.php
          'abonnees' => $abonnees
      ));
    }

    public function single($id)
        {
            // request pour aller chercher l'article qui possede cet id
            $abonnee = AbonneeModel::findById($id);

            $this->render('app.abonnees.single',array(
                // faire passer l'article à la vue dans view/app/article/single.php
                'abonnee' => $abonnee
            ));

        }

        public function add()
            {

                $errors = array();
                if(!empty($_POST['submitted'])) {
                    $post = $this->cleanXss($_POST);
                    $validation = new Validation();
                    $errors['nom'] = $validation->textValid($post['nom'], 'nom',3,  150);
                    $errors['prenom'] = $validation->textValid($post['prenom'], 'prenom',3,  150);
                    $errors['email'] = $validation->emailValid($post['email']);
                    $errors['age'] = $validation->textValid($post['age'], 'age',0, 3);

                    if($validation->IsValid($errors)) {

                        // insert +++
                        AbonneeModel::insert($post);

                        // le redirect marche pas aussi +++ ne marche non plus, je le modifie ce week end ;)
                         $this->redirect('listabonnee');
                    }
                }
                $form = new Form($errors);

                $this->render('app.abonnees.add',array(
                    'form'  => $form
                ));

            }

             public function update($id)
            {
          $errors = array();
          $abonnee = AbonneeModel::findById($id);
          if(empty($abonnee)) { $this->Abort404(); }
          if(!empty($_POST['submitted'])) {
              $post = $this->cleanXss($_POST);
              $validation = new Validation();
              $errors['nom'] = $validation->textValid($post['nom'], 'nom',3,  150);
              $errors['prenom'] = $validation->textValid($post['prenom'], 'prenom',3,  150);
              $errors['email'] = $validation->emailValid($post['email']);
              $errors['age'] = $validation->textValid($post['age'], 'age',0, 3);
              if($validation->IsValid($errors)) {
                  // update
                  AbonneeModel::update($id,$post);
                  $this->redirect('listabonnee');
              }
          }
          $form = new Form($errors);
          $this->render('app.abonnees.update',array(
              'form'     => $form,
              'abonnee'  => $abonnee
          ));
      }

      public function delete($id)
    {
        $abonnee = AbonneeModel::findById($id);
        if(empty($abonnee)) { $this->Abort404(); }
        AbonneeModel::delete($id);
        $this->redirect('listabonnee');
    }
}
