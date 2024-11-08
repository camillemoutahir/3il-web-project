<?php

require_once File::build_path(array("Model", "Model.php"));

class ModelPresentation {

    private int $id;
    private string $contenu;

    public function __construct($id = NULL, $contenu = NULL) {
        if (!is_null($id) && !is_null($contenu)) {
            $this->id = $id;
            $this->contenu = $contenu;
        }
    }

    public function getContenu():string {
        return $this->contenu;
        
    }

    public function setContenu(string $contenu) {
        $this->contenu = $contenu;
    }

    public static function getPresentations() {
        global $conn;
        $sql = "SELECT * FROM presentation";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $presentations = [];
        while ($row = $result->fetch_object('ModelPresentation')) {
            $presentations[] = $row;
        }
        return $presentations;
    }

    public static function createPresentation($contenu) {
        global $conn;
        $sql = "INSERT INTO presentation (contenu) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $contenu);
        
        if ($stmt->execute()) {
            return $conn->insert_id;
        }
        
        return null;
    }

    public static function updatePresentation($id, $contenu) {
        global $conn;
        $sql = "UPDATE presentation SET contenu = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $contenu, $id);
        
        return $stmt->execute();
    }

    public static function deletePresentation($id) {
        global $conn;
        $sql = "DELETE FROM presentation WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        return $stmt->execute();
    }

    public function getId() {
        return $this->id;
    }

    public static function readAll() {
        global $conn;
        $sql = "SELECT * FROM presentation";
        $result = $conn->query($sql);
        
        $presentations = [];
        while ($row = $result->fetch_object('ModelPresentation')) {
            $presentations[] = $row;
        }
        
        return $presentations;
    }

    public static function read($id) {
        global $conn;
        $sql = "SELECT * FROM presentation WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_object('ModelPresentation');
        }
        
        return null;
    }
}

?>