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

require_once("./config/variables.php");
require_once("./config/header.php");
require_once("./config/connection.php");

$cat = array();
$nomMenu = array();
$prixMenu = array();
$descrMenu = array();

try {
    // Requête SQL
    $sql = "SELECT * FROM categorie;";
    $stmt = $con->query($sql);
    
    // Afficher les résultats
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($cat, $row["nom"]);
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}

try {
    // Requête SQL
    $sql = "SELECT * FROM menu;";
    $stmt = $con->query($sql);
    
    // Afficher les résultats
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($nomMenu, $row["nom"]);
            array_push($prixMenu, $row["prix"]);
            array_push($descrMenu, $row["Description"]);
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}


?>
<body>

    <!-- Our Packages -->


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
                            <button type="button"
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
                            <button type="button"
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
                            <button type="button"
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
                            <button type="button"
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
                            <button type="button"
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
                            <button type="button"
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
                            <button type="button"
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
                            <button type="button"
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
                            <button type="button"
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