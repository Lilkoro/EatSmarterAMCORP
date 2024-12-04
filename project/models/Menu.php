<?php
class Menu {
    private $conn;
    private $table_name = "menu";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getMenuByCategory() {
        $query = "SELECT m.id, m.nom, m.prix, m.Description, c.nom as categorie_nom 
                 FROM " . $this->table_name . " m 
                 JOIN catégorie c ON m.idCat = c.id 
                 ORDER BY c.id, m.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>