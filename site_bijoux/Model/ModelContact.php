<?php

require_once File::build_path(array("Model", "Model.php"));

class ModelContact {
    private $nom;
    private $email;
    private $telephone;
    private $adresse;

    public function __construct($nom = NULL, $email = NULL, $telephone = NULL, $adresse = NULL) {
        if (!is_null($nom) && !is_null($email) && !is_null($telephone) && !is_null($adresse)) {
            $this->nom = $nom;
            $this->email = $email;
            $this->telephone = $telephone;
            $this->adresse = $adresse;
        }
    }

    public static function getContactInfo() {
        global $conn;
        $sql = "SELECT * FROM contacts LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Il n'y a qu'un seul contact, donc fetch_assoc est suffisant
        return $result->fetch_assoc();
    }

    //Méthode pour mettre à jour les informations de contact
    public static function updateContactInfo($field, $new_value) {
        global $conn;
        $sql = "UPDATE contacts SET $field = ? WHERE id = 1"; // On suppose que l'ID des informations de contact est 1
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $new_value);
        return $stmt->execute();
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getAdresse() {
        return $this->adresse;
    }
}
?>
