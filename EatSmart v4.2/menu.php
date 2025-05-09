
<?php
/**
 * @brief Page de menu.
 * 
 * @file menu.php
 * 
 * @details Cette page affiche le menu du restaurant.
 * 
 * @author Amir Marc
 * @date 2023-10-01
 */
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Food</title>
    <?php
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    require_once './vendor/autoload.php';

    $secret_key = "MaSuperCleSecrete";
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($_COOKIE['jwt'])) {
        http_response_code(403);
        header("Location: login/index.php");
        exit; // Stop further execution if Authorization header is missing
    }
    $jwt = $_COOKIE['jwt'] ?? null;

    try {
        $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
    } catch (Exception $e) {
        http_response_code(401);
        echo "Invalid token: " . $e->getMessage();
        exit; // Stop further execution if token is invalid
    }
    ?>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
    <?php 
    require("./config/header.php");
    require("./api/connection.php");
    include("./config/plat.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
<?php require_once("./config/footer.php"); ?>

</html>