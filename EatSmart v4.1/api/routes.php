<?php
require_once "./connection.php";
require_once "../controllers/ClientsController.php";

// Détection de la méthode HTTP et appel du bon contrôleur
$requestMethod = $_SERVER["REQUEST_METHOD"];

switch ($requestMethod) {
    case "GET":
        if(isset($_GET["type"])){
            getCategorie();
        } else {
            getItems();
        }
        break;

    case "POST":
        createClients();
        break;

    case "PUT":
        updateClients();
        break;

    case "DELETE":
        deleteClients();
        break;
}
?>