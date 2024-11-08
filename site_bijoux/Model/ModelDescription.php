<?php

require_once File::build_path(array("Model", "Model.php"));

class ModelDescription {
    private $id;
    private $image_url;
    private $description_text;
    private $prix;
    private $categorie;

    public function __construct($id = NULL, $image_url = NULL, $description_text = NULL, $prix = NULL, $categorie = NULL) {
        if (!is_null($id) && !is_null($image_url) && !is_null($description_text) && !is_null($prix) && !is_null($categorie)) {
            $this->id = $id;
            $this->image_url = $image_url;
            $this->description_text = $description_text;
            $this->prix = $prix;
            $this->categorie = $categorie;
        }
    }
    public static function getAllDescriptions() {
        global $conn;
        $sql = "SELECT * FROM descriptions";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $descriptions = [];
        while ($row = $result->fetch_object('ModelDescription')) {
            $descriptions[] = $row;
        }
        return $descriptions;
    }
    
    // Méthode pour obtenir le prix minimum
    public static function getMinPrice() {
        global $conn;
        $sql = "SELECT MIN(prix) AS min_price FROM descriptions";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['min_price'];
    }

    // Méthode pour obtenir le prix maximum
    public static function getMaxPrice() {
        global $conn;
        $sql = "SELECT MAX(prix) AS max_price FROM descriptions";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['max_price'];
    }

    // Méthode pour obtenir les descriptions filtrées par catégorie et prix
    public static function getFilteredDescriptions($category = '', $price_min = 0, $price_max = PHP_INT_MAX) {
        global $conn;
        $sql = "SELECT * FROM descriptions WHERE prix >= ? AND prix <= ?";
        $params = [$price_min, $price_max];
        $types = "dd";

        // Filtrer par catégorie si elle est définie
        if (!empty($category)) {
            $sql .= " AND categorie = ?";
            $params[] = $category;
            $types .= "s";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        $descriptions = [];
        while ($row = $result->fetch_object('ModelDescription')) {
            $descriptions[] = $row;
        }

        return $descriptions;
    }
    
    public static function updateDescription($id, $description_text) {
        global $conn;
        $sql = "UPDATE descriptions SET description_text = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $description_text, $id);
        return $stmt->execute();
    }

    public static function deleteDescription($id) {
        global $conn;
        $sql = "DELETE FROM descriptions WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public static function insertDescription($image_url, $description_text, $prix, $categorie) {
        global $conn;
        $sql = "INSERT INTO descriptions (image_url, description_text, prix, categorie) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssds', $image_url, $description_text, $prix, $categorie);
        return $stmt->execute();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getImageUrl() {
        return $this->image_url;
    }

    public function getDescriptionText() {
        return $this->description_text;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getCategorie() {
        return $this->categorie;
    }
}
?>