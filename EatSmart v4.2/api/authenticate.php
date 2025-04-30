<?php
/**
 * 
 * 
 * @author Amir et Marc
 * Script d'authentification pour le site EatSmart
 * @var string $secret_key Utilisation d'une clé secrete pour le JWT
 * @var array $data Récupération des données envoyées par le client
 * @var string $username, $password Nom d'utilisateur et Mot de passe
 * @var string $stmt Préparation de la requête SQL
 * 
 * 
 */

require_once '../vendor/autoload.php';
require_once '../config/database.php';
use Firebase\JWT\JWT;

$secret_key = "MaSuperCleSecrete";
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['username']) || !isset($data['password'])) {
    http_response_code(400);
    echo json_encode(["error" => "Données manquantes"]);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$data['username']]);
$user = $stmt->fetch();

if ($user && password_verify($data['password'], $user['password'])) {
    $payload = [
        "userId" => $user['id'],
        "iat" => time(),
        "exp" => time() + 3600
    ];
    $jwt = JWT::encode($payload, $secret_key, 'HS256');
    echo json_encode(["token" => $jwt]);
} else {
    http_response_code(401);
    echo json_encode(["error" => "Identifiants incorrects"]);
}
