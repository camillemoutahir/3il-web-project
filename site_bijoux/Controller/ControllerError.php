<?php

class ControllerError {
    public static function errorPageNonExistRoute() {
        $controller = 'error';
        $view = 'error';
        $pagetitle = 'Erreur - Page non trouvée';
        $description = 'La page que vous avez demandée n\'existe pas.';
        require File::build_path(array("View", "base.php"));
    }

}

?>
