<?php

/**
 * @file config/plat.php
 * 
 * @brief Page de configuration pour afficher les plats.
 * 
 * Ce fichier gère l'affichage des plats disponibles dans le menu.
 * Il utilise une API pour récupérer les données des plats et les catégories.
 */

$filename = $_SERVER["SCRIPT_NAME"];
if ($filename == "/Marc/EatSmart/EatSmart v4.2/config/plat.php") {
    require("../api/connection.php");
    $img = "../../Assestss/tenders.png";
} else {
    require("./api/connection.php");
    $img = "./../Assestss/tenders.png";
}
/**
 * @brief Récupérer les menus de l'API.
 */
$curl = curl_init();
if(isset($_GET["id"])){
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/Marc/EatSmart/EatSmart%20v4.2/api/index.php?id='.$_GET["id"],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));

} else {
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost/Marc/EatSmart/EatSmart%20v4.2/api/index.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));
}


$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

// Vérifier le code HTTP
if ($httpCode !== 200) {
    die("Erreur : l'API a retourné le code HTTP " . $httpCode);
}

// Vérifier si la réponse est vide
if (empty($response)) {
    die("Erreur : la réponse de l'API est vide.");
}

// Nettoyer la réponse brute pour extraire uniquement le JSON
$jsonStart = strpos($response, '['); // Trouver la position du premier crochet ouvrant
if ($jsonStart === false) {
    die("Erreur : JSON invalide, aucun tableau détecté.");
}
$response = substr($response, $jsonStart); // Extraire uniquement la partie JSON

// Décoder la réponse JSON
$response = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Erreur lors du décodage JSON : " . json_last_error_msg() . "\nRéponse brute nettoyée : " . $response);
}

// Initialiser les tableaux
$menus = array( "nomMenu" => array(), "prixMenu" => array(), "description" => array(), "nomCat" => array() );
$cat = array();
$id = array();

// Parcourir les éléments de la réponse
foreach ($response as $items) {
    array_push($id, $items["id"]);
    array_push($menus["nomMenu"], $items["nom"]);
    array_push($menus["prixMenu"], $items["prix"]);
    array_push($menus["description"], $items["description"]);
    array_push($menus["nomCat"], $items["nomCat"]);
}
/**
 * @brief Récupérer les catégories de l'API.
 */
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/Marc/EatSmart/EatSmart%20v4.2/api/index.php?type=categorie',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

// Vérifier le code HTTP
if ($httpCode !== 200) {
    die("Erreur : l'API a retourné le code HTTP " . $httpCode);
}

// Vérifier si la réponse est vide
if (empty($response)) {
    die("Erreur : la réponse de l'API est vide.");
}

// Nettoyer la réponse brute pour extraire uniquement le JSON
$jsonStart = strpos($response, '['); // Trouver la position du premier crochet ouvrant
if ($jsonStart === false) {
    die("Erreur : JSON invalide, aucun tableau détecté.");
}
$response = substr($response, $jsonStart); // Extraire uniquement la partie JSON

// Décoder la réponse JSON
$response = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Erreur lors du décodage JSON : " . json_last_error_msg() . "\nRéponse brute nettoyée : " . $response);
}

// Parcourir les éléments de la réponse
foreach ($response as $cate) {
    array_push($cat, $cate["nom"]);
}

?>
<body>

<!-- Our Packages -->

<form id="ajoutPanier" action="config/ajout_panier.php" method="POST"></form>

<div class="container-fluid image-back-1-2 bg-danger-subtle" id="PRODUCT">
    <div class="container">
        <?php foreach ($cat as $catIndex => $categorie): ?>
            <div class="row pt-5 pb-5">
                <div class="col">
                    <div class="h1 text-center text-danger-emphasis"></div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">
                <?php 
                // Afficher 3 menus pour chaque catégorie
                for ($menuIndex = $catIndex * 3; $menuIndex < ($catIndex * 3) + 3; $menuIndex++): 
                    if (isset($menus['nomMenu'][$menuIndex])): // Vérifier si le menu existe
                ?>
                    <div class="col">
                        <div class="card card-pack">
                            <h4 class="card-title text-danger text-center pt-3 pb-3"><?php echo html_entity_decode(htmlspecialchars($menus['nomMenu'][$menuIndex])); ?></h4>
                            <img src="<?php echo $img; ?>" class="card-img w-25 align-self-center" alt="Loading...">
                            <div class="card-body text-center">
                                <h5 class="card-text text-danger fs-4" ><?php echo htmlspecialchars($menus['prixMenu'][$menuIndex]); ?></h5>
                                <p class="card-text text-danger pe-3 ps-3"><?php echo html_entity_decode(htmlspecialchars($menus['description'][$menuIndex])); ?></p>
                                <button type="submit" form="ajoutPanier" name="btn<?php echo $menuIndex; ?>" id="btn<?php echo $menuIndex; ?>" value="<?php echo $menuIndex; ?>"
                                    class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4" data-name="<?php echo html_entity_decode(htmlspecialchars($menus['nomMenu'][$menuIndex])); ?>" data-price="<?php echo htmlspecialchars($menus['prixMenu'][$menuIndex]); ?>">Ajout au Panier</button>
                            </div>
                        </div>
                    </div>
                <?php 
                    endif;
                endfor; 
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>