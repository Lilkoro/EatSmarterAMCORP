<?php
function redirectToUrl($url)
{
    header("Location: {$url}");
    exit();
}

session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (count($_POST) > 0) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'btn') === 0) {
            $productId = 'p' . substr($key, 3);
            if (!isset($_SESSION['panier'][$productId])) {
                $_SESSION['panier'][$productId] = 0;
            }
            $_SESSION['panier'][$productId] += (int)$value;
        }
    }
    print_r($_SESSION);
} else {
    echo "Aucun produit selectionné";
}
redirectToUrl('../menu.php');
