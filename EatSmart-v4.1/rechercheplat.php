<?php
// Formulaire de recherche de plat
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Recherche de plat</title>
</head>

<body>
    <h1>Rechercher un plat</h1>
    <form action="plats.php" method="get">
        <label for="nom">Nom du plat :</label>
        <input type="text" name="nom" id="nom" required>
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>