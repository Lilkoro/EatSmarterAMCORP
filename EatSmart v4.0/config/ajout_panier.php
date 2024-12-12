<?php
function redirectToUrl($url)
{
    header("Location: {$url}");
    exit();
}

session_start();
$lengh =  count($_POST);
if($lengh > 0){
    foreach ($_POST as $key => $value) {
        $_SESSION['panier'] = $_SESSION['panier'].$value;
    }
}
redirectToUrl('../menu.php');