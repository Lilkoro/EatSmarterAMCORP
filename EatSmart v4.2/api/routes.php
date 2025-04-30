<?php
/**
 * @file api/routes.php
 * 
 * @brief Point d'entrée pour les requêtes API de gestion des clients.
 * 
 * Ce fichier gère les requêtes API pour la gestion des clients, y compris la création, la mise à jour et la suppression.
 * Il inclut les fichiers de configuration et de connexion à la base de données.
 */

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