<?php
require_once "../api/connection.php";

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

function getCategorie() {
    global $con;
    $stmt = $con->query("SELECT * FROM categorie");
    $test = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo $test;
}

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