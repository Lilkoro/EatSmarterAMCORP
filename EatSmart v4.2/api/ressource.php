<?php

/**
 * @file api/ressource.php
 * 
 * @brief Point d'entrée pour la gestion des ressources.
 * @var string $secret_key Utilisation d'une clé secrete pour le JWT
 * @var array $headers Récupération des en-têtes de la requête
 * @var string $jwt Récupération du JWT dans l'en-tête Authorization
 * 
 * Ce fichier gère les requêtes API pour la gestion des ressources, y compris l'ajout au panier.
 * Il inclut les fichiers de configuration et de connexion à la base de données.
 */

require_once '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "MaSuperCleSecrete";
$headers = getallheaders();

if (!isset($headers['Authorization'])) {
    http_response_code(403);
    echo json_encode(["error" => "JWT manquant"]);
    exit;
}

$jwt = str_replace("Bearer ", "", $headers['Authorization']);

try {
    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
    echo json_encode(["message" => "Accès autorisé"]);
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(["error" => "JWT invalide : " . $e->getMessage()]);
}
