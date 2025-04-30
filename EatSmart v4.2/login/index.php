<?php
/**
 * @file login/index.php
 * 
 * @brief Page de connexion pour l'application EatSmart.
 * 
 */

use Firebase\JWT\JWT;
// Connexion à la base de données
$host = '127.0.0.1';
$dbname = 'eatsmart';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
// Inclusion de la bibliothèque JWT
require_once '../vendor/autoload.php';
$secret_key = "MaSuperCleSecrete";

// Gestion de la soumission du formulaire

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    // Suppression des espaces inutiles
    $username = trim($username);
    $password = trim($password);
    // Vérification des champs
    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) {

            $payload = [
                "userId" => $user['id'],
                "iat" => time(),
                "exp" => time() + 3600
            ];
            $jwt = JWT::encode($payload, $secret_key, 'HS256');
            setcookie("jwt", $jwt, [
                'expires' => time() + 3600,
                'path' => '/',
                'secure' => false, // Set to true if using HTTPS
                'httponly' => true,
                'samesite' => 'Lax'
            ]);
            header("Location: ../menu.php");
            print_r($_COOKIE);
            exit;
        } else {
            $error = "username ou mot de passe incorrect.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - EatSmart</title>
    <link rel="stylesheet" href="/c:/wamp64/www/Marc/EatSmart/EatSmart v4.1/styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Connexion</h1>
        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Login :</label>
                <input type="username" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>