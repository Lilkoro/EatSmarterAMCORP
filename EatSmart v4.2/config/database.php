<?php
/**
 * @file config/database.php
 * 
 * @brief Configuration de la connexion à la base de données.
 * 
 * Ce fichier contient les informations de connexion à la base de données MySQL.
 * Il utilise PDO pour établir la connexion et gérer les erreurs.
 */

$host = "localhost";
$dbname = "auth_jwt";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
