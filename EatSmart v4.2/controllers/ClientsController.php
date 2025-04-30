<?php
/**
 * @file ClientsController.php
 * 
 */
require_once "../api/connection.php";

/**
 * @brief Récupérer les plats de l'API.
 * 
 * @param int $id L'identifiant du plat à récupérer (facultatif).
 * @param string $nom Le nom du plat à récupérer (facultatif).
 */

function getItems() {
    global $con;
    $id = @$_GET["id"];
    $nom = @$_GET["nom"];
    if(isset($nom)) {
        echo "ici";
        $stmt = $con->prepare("SELECT * FROM menu WHERE nom = ?");
        $stmt->execute([$nom]);
        $test = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        echo $test;
    }
    elseif (is_null($id) || is_nan($id)){
        echo "icia";
        $stmt = $con->query("SELECT * FROM menu");
        $test = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        echo $test;
    }
    else {
        echo "iciz";
        $stmt = $con->prepare("SELECT * FROM menu WHERE id = ?");
        $stmt->execute([$id]);
        $test = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        echo $test;
    }
}

/**
 * @brief Récupérer les catégories de l'API.
 * 
 * @param int $id L'identifiant de la catégorie à récupérer (facultatif).
 */

function getCategorie() {
    global $con;
    $stmt = $con->query("SELECT * FROM categorie");
    $test = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo $test;
}

/**
 * @brief Créer un plat dans l'API.
 * 
 * @param string $nom Le nom du plat à créer.
 * @param string $description La description du plat à créer.
 * @param float $prix Le prix du plat à créer.
 * @param int $id_categorie L'identifiant de la catégorie du plat à créer.
 */

function createClients() {
    global $con;
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input["nom"]) || !isset($input["email"]) || !isset($input["telephone"])) {
        http_response_code(400);
        echo json_encode(["error" => "Données incomplètes"]);
        return;
    }

    $stmt = $con->prepare("INSERT INTO clients (nom, email, telephone) VALUES (?, ?, ?)");
    $stmt->execute([$input["nom"], $input["email"], $input["telephone"]]);

    echo json_encode(["message" => "Client ajouté"]);
}

/**
 * @brief Mettre à jour un plat dans l'API.
 * 
 * @param int $id L'identifiant du plat à mettre à jour.
 * @param string $nom Le nouveau nom du plat.
 * @param string $description La nouvelle description du plat.
 * @param float $prix Le nouveau prix du plat.
 * @param int $id_categorie L'identifiant de la nouvelle catégorie du plat.
 */
function updateClients() {
    global $con;
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input["id"]) || !isset($input["nom"]) || !isset($input["email"]) || !isset($input["telephone"])) {
        http_response_code(400);
        echo json_encode(["error" => "Données incomplètes"]);
        return;
    }

    $stmt = $con->prepare("UPDATE clients SET nom = ?, email = ?, telephone = ? WHERE id = ?");
    $stmt->execute([$input["nom"], $input["email"], $input["telephone"], $input["id"]]);

    echo json_encode(["message" => "Client mis à jour"]);
}

/**
 * @brief Supprimer un plat de l'API.
 * 
 * @param int $id L'identifiant du plat à supprimer.
 */
function deleteClients() {
    global $con;
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input["id"])) {
        http_response_code(400);
        echo json_encode(["error" => "ID manquant"]);
        return;
    }

    $stmt = $con->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->execute([$input["id"]]);

    echo json_encode(["message" => "Client supprimé"]);
}
?>