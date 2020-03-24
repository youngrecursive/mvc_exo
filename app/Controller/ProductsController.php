<?php

// app/Controller/ArticleController

namespace App\Controller;

use App\Service\Form;
use App\Service\Validation;
use App\Weblitzer\Controller;
use App\Model\ProductsModel;

/**
 *
 */
class ProductsController extends Controller
{
    public function index()
    {


      // aller chercher tous les articles
      $products = ProductsModel::all();
      //$this->debug($articles);
      $this->render('app.products.list',array(
          // faire passer les articles à la vue dans view/app/article/listing.php
          'products' => $products
      ));
    }

    public function single($id)
        {
            // request pour aller chercher l'article qui possede cet id
            $product = ProductsModel::findById($id);
            if(empty($product)) {
                // si article n'existe pas dans la BDD => error 404
                die('404');
                //$this->Abort404();
            }
            $this->render('app.products.single',array(
                // faire passer l'article à la vue dans view/app/article/single.php
                'product' => $product
            ));

        }

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
                        ProductsModel::insert($post);

                        // le redirect marche pas aussi +++ ne marche non plus, je le modifie ce week end ;)
                         $this->redirect('listproducts');
                    }
                }
                $form = new Form($errors);

                $this->render('app.products.add',array(
                    'form'  => $form
                ));

            }

              public function update($id)
            {
          $errors = array();
          $product = ProductsModel::findById($id);
          if(empty($product)) { $this->Abort404(); }
          if(!empty($_POST['submitted'])) {
              $post = $this->cleanXss($_POST);
              $validation = new Validation();
              $errors['titre'] = $validation->textValid($post['titre'], 'titre',2,  15);
              $errors['reference'] = $validation->textValid($post['reference'], 'reference',3,  15);
              $errors['description'] = $validation->textValid($post['description'], 'description',3,  1000);

              if($validation->IsValid($errors)) {
                  // update
                  ProductsModel::update($id,$post);
                  $this->redirect('listproducts');
              }
          }
          $form = new Form($errors);
          $this->render('app.products.update',array(
              'form'     => $form,
              'product'  => $product
          ));
      }

      public function delete($id)
    {
        $product = ProductsModel::findById($id);
        if(empty($product)) { $this->Abort404(); }
        ProductsModel::delete($id);
        $this->redirect('listproducts');
    }
}
