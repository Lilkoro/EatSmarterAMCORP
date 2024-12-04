<?php
function getMenuItems($conn) {
    try {
        $query = "SELECT m.nom, m.prix, m.Description, c.nom as categorie_nom 
                 FROM menu m 
                 JOIN catégorie c ON m.idCat = c.id 
                 ORDER BY c.id, m.id";
                 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        $menuItems = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categoryName = $row['categorie_nom'];
            if (!isset($menuItems[$categoryName])) {
                $menuItems[$categoryName] = [];
            }
            $menuItems[$categoryName][] = [
                'nom' => $row['nom'],
                'prix' => $row['prix'],
                'description' => $row['Description']
            ];
        }
        return $menuItems;
    } catch(PDOException $e) {
        echo "Query Error: " . $e->getMessage();
        return [];
    }
}
?>