<?php
if (!isset($_GET['nom'])) {
    echo "Aucun nom de plat fourni.";
    exit;
}

$nom = urlencode($_GET['nom']);
$url = "http://localhost/eatsmarter/EatSmarterAMCORP/EatSmart-v4.1/api/routes.php?nom={$nom}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Plat recherché</title>
</head>

<body>
    <h1>Résultat de la recherche</h1>
    <?php if (!empty($data) && isset($data[0])): ?>
        <ul>
            <li><strong>Nom :</strong> <?= htmlspecialchars($data[0]['nom']) ?></li>
            <li><strong>Description :</strong> <?= htmlspecialchars($data[0]['Description']) ?></li>
            <li><strong>Prix :</strong> <?= htmlspecialchars($data[0]['prix']) ?> €</li>
            <!-- Ajoute d'autres champs si besoin -->
        </ul>
    <?php else: ?>
        <p>Aucun plat trouvé avec ce nom.</p>
    <?php endif; ?>
</body>

</html>