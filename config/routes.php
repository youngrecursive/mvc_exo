<?php

$routes = array(
    array('home','default','index'),

    // Produits
    array('addproduct','products','add'),
    array('listproducts','products','index'),
    array('singleproducts','products','single',array('id')),
    array('updateproducts','products','update',array('id')),
    array('deleteproducts','products','delete',array('id')),

    // Abonnee
    array('addabonnee','abonnees','add'),
    array('listabonnee','abonnees','index'),
    array('singleabonnee','abonnees','single',array('id')),
    array('updateabonnee','abonnees','update',array('id')),
    array('deleteabonnee','abonnees','delete',array('id')),
);
