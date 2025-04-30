<?php

/**
 * @file api/index.php
 * 
 * @brief Point d'entrée pour les requêtes API de gestion des produits.
 * 
 * Ce fichier gère les requêtes API pour la gestion des produits, y compris l'ajout au panier.
 * Il inclut les fichiers de configuration et de connexion à la base de données.
 */

require "routes.php";
header("Content-Type: application/json");
?>