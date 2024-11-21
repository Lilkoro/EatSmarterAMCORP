


<?php
if(isset($_GET["email"])){
    echo "<h1>Message bien reçu ! </h1>";
    echo "<h3>Pour rappel des infos : </h3>";
    echo "</br>Votre e-mail est ".$_GET["email"]."</br>";
    echo "Message : ".$_GET["mess"];
} else {
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="pre" action="" method="get">
        <label for="email">Votre e-mail</label>    <br>
        <input type="email" id="email" name="email" require>    <br>
        <label for="mess">Votre message : </label>    <br>
        <input type="text" name="mess" id="mess" require>    <br>
    </form>
    <input type="submit" form="pre" value="Envoyez">
</body>
</html>';
}
?>