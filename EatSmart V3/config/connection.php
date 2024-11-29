<?php
try {
    $dns = "mysql:host=127.0.0.1;dbname=eatsmart;port=3306";
    $user = "root";
    $pass = "";
    $con = new PDO($dns,$user,$pass);
} catch (Exception $e) {
    echo "erreur => ". $e;
}