<?php
/**
 * @file config/ajout_panier.php
 * 
 * @brief Script pour ajouter un produit au panier.
 * 
 * Ce script gère l'ajout d'un produit au panier en utilisant des cookies.
 * Il vérifie si le produit existe et met à jour le panier en conséquence.
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'id' parameter is provided
    if (isset($_POST['id'])) {
        $productId = $_POST['id'];

        // Example product data (replace this with your database or other data source)
        $products = [
            1 => ['name' => 'Burger', 'price' => 5.99],
            2 => ['name' => 'Fries', 'price' => 2.99],
            3 => ['name' => 'Soda', 'price' => 1.99],
        ];

        // Check if the product exists
        if (isset($products[$productId])) {
            // Retrieve the cart from cookies
            $cart = isset($_COOKIE['panier']) ? json_decode($_COOKIE['panier'], true) : [];

            // Add the product to the cart
            if (!isset($cart[$productId])) {
                $cart[$productId] = [
                    'name' => $products[$productId]['name'],
                    'price' => $products[$productId]['price'],
                    'quantity' => 1,
                ];
            } else {
                $cart[$productId]['quantity']++;
            }

            // Save the updated cart in cookies
            setcookie('panier', json_encode($cart), time() + (86400 * 30), "/"); // Cookie expires in 30 days

            // Return the updated cart as JSON
            echo json_encode([
                'success' => true,
                'cart' => $cart,
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Produit non trouvé.',
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'ID du produit manquant.',
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Requête invalide.',
    ]);
}