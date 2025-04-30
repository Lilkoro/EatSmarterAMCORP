<?php
// Fonctions JWT sans librairie externe
function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
function base64url_decode($data)
{
    return base64_decode(strtr($data, '-_', '+/'));
}
function jwt_encode($payload, $secret)
{
    $header = ['typ' => 'JWT', 'alg' => 'HS256'];
    $segments = [];
    $segments[] = base64url_encode(json_encode($header));
    $segments[] = base64url_encode(json_encode($payload));
    $signing_input = implode('.', $segments);
    $signature = hash_hmac('sha256', $signing_input, $secret, true);
    $segments[] = base64url_encode($signature);
    return implode('.', $segments);
}
function jwt_decode($jwt, $secret)
{
    $parts = explode('.', $jwt);
    if (count($parts) !== 3) return false;
    list($header64, $payload64, $sig64) = $parts;
    $header = json_decode(base64url_decode($header64), true);
    $payload = json_decode(base64url_decode($payload64), true);
    $signature = base64url_decode($sig64);
    $valid_sig = hash_hmac('sha256', "$header64.$payload64", $secret, true);
    if (!hash_equals($signature, $valid_sig)) return false;
    if (isset($payload['exp']) && time() > $payload['exp']) return false;
    return $payload;
}

$secret_key = "LaCléDeLaPorte"; // Change cette clé !

// Simule une base d'utilisateurs (remplace par ta base réelle)
$users = [
    "root" => "root"
];

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        $payload = [
            "iss" => "EatSmart",
            "iat" => time(),
            "exp" => time() + 3600,
            "sub" => $username
        ];
        $jwt = jwt_encode($payload, $secret_key);
        setcookie("token", $jwt, time() + 3600, "/");
        header("Location: protected.php");
        exit;
    } else {
        $error = "Identifiants invalides.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>

</html>