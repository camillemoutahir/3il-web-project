<?php 
require_once File::build_path(array("Controller", "ControllerAccueil.php"));

class ControllerAdministration {

    public static function administrationLoginRoute () {
        $controller = 'admin';
        $view = 'login';
        $pagetitle = 'Administration - Bijoux';
        $description ='Administration du site web';
        require File::build_path(array("View", "base.php"));
    }
    public static function administrationDashboardRoute () {
        $controller = 'admin';
        $view = 'dashboard';
        $pagetitle = 'Administration - Bijoux';
        $description ='Administration du site web';
        require File::build_path(array("View", "base.php"));
    }

    public static function adminManageContactRoute () {
        $controller = 'admin';
        $view = 'manageContact';
        $pagetitle = 'Administration - Bijoux';
        $description ='Administration du site web';
        require File::build_path(array("View", "base.php"));
    }

    public static function adminManageDescriptionRoute () {
        $controller = 'admin';
        $view = 'manageDescriptions';
        $pagetitle = 'Administration - Bijoux';
        $description ='Administration du site web';
        require File::build_path(array("View", "base.php"));
    }

    public static function logout () {
        $_SESSION = array();
        session_destroy();
        ControllerAccueil::accueilRoute();
    }


}
