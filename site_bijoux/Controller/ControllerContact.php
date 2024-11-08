<?php 

require_once File::build_path(array("Model", "ModelContact.php"));

class ControllerContact {

    public static function contactRoute() {
        $contact = ModelContact::getContactInfo();
        $controller = 'contact';
        $view = 'contact';
        $pagetitle = 'Contact - Bijoux';
        $description = 'Contact du site web';

        require File::build_path(array("View", "base.php"));
    }

}
?>
