<?php
// Connexion à la base de données
require_once './api/connection.php'; // Assurez-vous que ce fichier contient la connexion PDO

// Initialisation des variables
$plats = [];
$searchTerm = '';

// Vérification si un terme de recherche est fourni
if (isset($_GET['nom']) && !empty($_GET['nom'])) {
    $searchTerm = htmlspecialchars($_GET['nom']); // Échapper les caractères spéciaux pour éviter les injections XSS

    // Préparation et exécution de la requête SQL
    $stmt = $con->prepare("SELECT * FROM `article` WHERE `nom` LIKE :nom");
    $stmt->execute([':nom' => $searchTerm . '%']);
    $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Recherche de plat</title>
</head>

<body>
    <h1>Rechercher un plat</h1>
    <form action="rechercheplat.php" method="get">
        <label for="nom">Nom du plat :</label>
        <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($searchTerm); ?>" required>
        <button type="submit">Envoyer</button>
    </form>

    <?php if (!empty($plats)): ?>
        <h2>Résultats de la recherche :</h2>
        <ul>
            <?php foreach ($plats as $plat): ?>
                <li>
                    <h3><?php echo htmlspecialchars($plat['nom']); ?></h3>
                    <p><strong>Prix :</strong> <?php echo htmlspecialchars($plat['prix']); ?> €</p>
                    <p><strong>Description :</strong> <?php echo htmlspecialchars($plat['descr']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($searchTerm): ?>
        <p>Aucun plat trouvé pour "<?php echo htmlspecialchars($searchTerm); ?>".</p>
    <?php endif; ?>
</body>

</html>