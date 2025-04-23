<?php
try {
    $dns = "mysql:host=127.0.0.1;dbname=eatsmart;port=3306";
    $user = "root";
    $pass = "";
    $con = new PDO($dns, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    // Configurer PDO pour gérer les erreurs en mode Exception et l'utf8
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "erreur => ". $e;
}