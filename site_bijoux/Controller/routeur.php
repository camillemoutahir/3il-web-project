<?php

session_name('projet');
session_start();
require_once File::build_path(array("Controller", "ControllerAccueil.php"));
require_once File::build_path(array("Controller", "ControllerDescription.php"));
require_once File::build_path(array("Controller", "ControllerContact.php"));
require_once File::build_path(array("Controller", "ControllerAdministration.php"));
require_once File::build_path(array("Controller", "ControllerError.php"));

if (!isset($_GET['action'])) {
    ControllerAccueil::accueilRoute();
} else {
        $action = $_GET['action'];
    if (!isset($_GET['controller'])) {
        $controller = 'accueil';
    } else {
        $controller = $_GET['controller'];
    }

    $controller_class = 'Controller' . ucfirst($controller);

    if (class_exists($controller_class)) {
        $allMethodsController = get_class_methods($controller_class);
        if (in_array($action, $allMethodsController)) {
            $controller_class::$action();
        } else {
            ControllerError::errorPageNonExistRoute();
        } 
    } else {
        ControllerError::errorPageNonExistRoute();
    }
}
?>