<?php 
require_once File::build_path(array("Model", "ModelPresentation.php"));

class ControllerAccueil {

    public static function accueilRoute () {
        $presentation = ModelPresentation::readAll();
        $controller = 'accueil';
        $view = 'accueil';
        $pagetitle = 'Accueil - Bijoux';
        $description ='Accueil du site web';
        require File::build_path(array("View", "base.php"));
    }

    

}