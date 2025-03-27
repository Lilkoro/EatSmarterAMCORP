<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Food</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<?php 
session_start();
require("./config/header.php");
require("./api/connection.php");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/Marc/EatSmart/EatSmart%20v4.1/api/index.php',
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

// Initialiser les tableaux
$cat = array();
$nomMenu = array();
$prixMenu = array();
$descrMenu = array();
$id = array();

// Parcourir les éléments de la réponse
foreach ($response as $items) {
    array_push($id, $items["id"]);
    array_push($nomMenu, $items["nom"]);
    array_push($prixMenu, $items["prix"]);
    array_push($descrMenu, $items["Description"]);
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/Marc/EatSmart/EatSmart%20v4.1/api/index.php?type=categorie',
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

if(count($_SESSION) > 0){
    $m1 = 0;
    $m2 = 0;
    $m3 = 0;
    $m4 = 0;
    $m5 = 0;
    $m6 = 0;
    $m7 = 0;
    $m8 = 0;
    $m9 = 0;

    $qte = str_split($_SESSION['panier'] ,1);
    foreach ($qte as $key => $value) {
        echo $key.' => '.$value;
    }
}

?>
<body>

    <!-- Our Packages -->

    <form id="ajoutPanier" action="config/ajout_panier.php" method="POST"></form>

    <div class="container-fluid image-back-1-2 bg-danger-subtle" id="PRODUCT">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col">
                    <div class="h1 text-center text-danger-emphasis"><?php echo $cat[0]; ?></div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center text-danger pt-3 pb-3"><?php echo $nomMenu[0];?></h4>
                        <img src="../Assestss/tenders.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[0];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu[0];?></p>
                            <button type="submit" form="ajoutPanier" name="btn1" id="btn1" form="ajoutPanier" value="<?php echo $id[0];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-danger text-center pt-3 pb-3"><?php echo $nomMenu[1];?></h4>
                        <img src="../Assestss/tenders.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[1];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu[1];?></p>
                            <button type="submit" form="ajoutPanier" name="btn2" id="btn2" form="ajoutPanier" value="<?php echo $id[1];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center pt-3 pb-3"><?php echo $nomMenu[2];?></h4>
                        <img src="../Assestss/tenders.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[2];?></h5>
                            <p class="card-text text-danger ps-3 pe-3"><?php echo $descrMenu[2];?></p>
                            <button type="submit" form="ajoutPanier" name="btn3" id="btn3" form="ajoutPanier" value="<?php echo $id[2];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 pb-5">
                <div class="col">
                    <div class="h1 text-center text-danger-emphasis"><?php echo $cat[1]; ?></div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center text-danger pt-3 pb-3"><?php echo $nomMenu[3];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[3];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu[3];?></p>
                            <button type="submit" form="ajoutPanier" name="btn4" id="btn4" form="ajoutPanier" value="<?php echo $id[3];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-danger text-center pt-3 pb-3"><?php echo $nomMenu[4];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[4];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu[4];?></p>
                            <button type="submit" form="ajoutPanier" name="btn5" id="btn5" form="ajoutPanier" value="<?php echo $id[4];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center pt-3 pb-3"><?php echo $nomMenu[5];?></h4>
                        <img src="../Assestss/10.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[5];?></h5>
                            <p class="card-text text-danger ps-3 pe-3"><?php echo $descrMenu[5];?></p>
                            <button type="submit" form="ajoutPanier" name="btn6" id="btn6" form="ajoutPanier" value="<?php echo $id[5];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-5 pb-5">
                <div class="col">
                    <div class="h1 text-center text-danger-emphasis"><?php echo $cat[2]; ?></div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 gy-4 pb-5">
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center text-danger pt-3 pb-3"><?php echo $nomMenu[6];?></h4>
                        <img src="../Assestss/dessert.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[6];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu[6];?></p>
                            <button type="submit" form="ajoutPanier" name="btn7" id="btn7" form="ajoutPanier" value="<?php echo $id[6];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-danger text-center pt-3 pb-3"><?php echo $nomMenu[7];?></h4>
                        <img src="../Assestss/dessert.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[7];?></h5>
                            <p class="card-text text-danger pe-3 ps-3"><?php echo $descrMenu[7];?></p>
                            <button type="submit" form="ajoutPanier" name="btn8" id="btn8" form="ajoutPanier" value="<?php echo $id[7];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack">
                        <h4 class="card-title text-danger text-center pt-3 pb-3"><?php echo $nomMenu[8];?></h4>
                        <img src="../Assestss/dessert.png" class="card-img w-25 align-self-center" alt="Loading...">
                        <div class="card-body text-center">
                            <h5 class="card-text text-danger fs-4"><?php echo $prixMenu[8];?></h5>
                            <p class="card-text text-danger ps-3 pe-3"><?php echo $descrMenu[8];?></p>
                            <button type="submit" form="ajoutPanier" name="btn9" id="btn9" form="ajoutPanier" value="<?php echo $id[8];?>"
                                class="btn bg-danger text-white border-0 rounded-5 pe-4 ps-4 fs-4">Ajout au Panier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
<?php require_once("./config/footer.php"); ?>

</html>