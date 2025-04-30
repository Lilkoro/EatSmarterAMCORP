<?php
/**
 * @brief Page de contact.
 * 
 * @file contact.php
 */
if(isset($_GET["email"])){
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecontact.css" />
    <title>Document</title>
</head>
<body>
<div class="container">
        <h2>Contactez nous !</h2>
        <h1>Message bien reçu !</h1>
        <h3>Pour rappel des infos : </h3>';
        echo '</br>Votre nom est : '.$_GET["Nom"].'</br>';
        echo '</br>Votre e-mail est '.$_GET["email"].'</br>';
        echo 'Message : '.$_GET["msg"];
    echo '</div>
</body>
</html>';
} else {
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecontact.css" />
    <title>Document</title>
</head>
<body>
<div class="container">
        <h2>Contactez nous !</h2>
        <form action="">
            <input type="text" name="Nom" id="Nom" placeholder="Nom" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Votre message..."></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>';
}
?>