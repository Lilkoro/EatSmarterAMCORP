<?php
function getDbConnection() {
    $host = "127.0.0.1";
    $dbname = "eatsmart";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection Error: " . $e->getMessage();
        return null;
    }
}
?>