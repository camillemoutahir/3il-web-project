<?php 
require_once File::build_path(array("Model", "ModelDescription.php"));

class ControllerDescription {

    public static function descriptionRoute () {
        $min_price = floor(ModelDescription::getMinPrice());
        $max_price = ceil(ModelDescription::getMaxPrice());

        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $price_min = isset($_GET['price_min']) ? (float) $_GET['price_min'] : $min_price;
        $price_max = isset($_GET['price_max']) ? (float) $_GET['price_max'] : $max_price;

        if ($category === '' && $price_min == $min_price && $price_max == $max_price) {
            $descriptions = ModelDescription::getAllDescriptions();
        } else {
            $descriptions = ModelDescription::getFilteredDescriptions($category, $price_min, $price_max);
        }

        $controller = 'description';
        $view = 'description';
        $pagetitle = 'Nos Bijoux';
        $description = 'Description du site web';

        require File::build_path(array("View", "base.php"));
    }


}
