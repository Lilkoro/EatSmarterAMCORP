<?php
try {
    $dns = "mysql:host=127.0.0.1;dbname=eatsmart;port=3306";
    $user = "root";
    $pass = "";
    $con = new PDO($dns,$user,$pass);
    // Configurer PDO pour gérer les erreurs en mode Exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "erreur => ". $e;
}