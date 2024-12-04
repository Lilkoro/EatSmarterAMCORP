<?php
function displayMenuItem($item, $imagePath) {
    echo '<div class="col">';
    echo '<div class="card card-pack">';
    echo '<h4 class="card-title text-danger text-center pt-3 pb-3">' . htmlspecialchars($item['nom']) . '</h4>';
    echo '<img src="' . $imagePath . '" class="card-img w-25 align-self-center" alt="Loading...">';
    echo '<div class="card-body text-center">';
    echo '<h5 class="card-text text-danger fs-4">' . htmlspecialchars($item['prix']) . '€</h5>';
    echo '<p class="card-text text-danger pe-3 ps-3">' . htmlspecialchars($item['description']) . '</p>';
    echo '<button type="button" class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>';
    echo '</div></div></div>';
}

function getCategoryImage($category) {
    switch ($category) {
        case 'Poulet & Bucket':
            return '../Assestss/tenders.png';
        case 'Burgers':
            return '../Assestss/10.png';
        case 'Desserts':
            return '../Assestss/dessert.png';
        default:
            return '../Assestss/default.png';
    }
}

function displayMenuCategory($category, $items) {
    echo '<div class="container-fluid image-back-1-2 bg-danger-subtle">';
    echo '<div class="container">';
    echo '<div class="row pt-5 pb-5">';
    echo '<div class="col">';
    echo '<div class="h1 text-center text-danger-emphasis">' . htmlspecialchars($category) . '</div>';
    echo '</div></div>';
    
    echo '<div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">';
    
    foreach ($items as $item) {
        displayMenuItem($item, getCategoryImage($category));
    }
    
    echo '</div></div></div>';
}

function displayFullMenu($menuItems) {
    foreach ($menuItems as $category => $items) {
        displayMenuCategory($category, $items);
    }
}
?>