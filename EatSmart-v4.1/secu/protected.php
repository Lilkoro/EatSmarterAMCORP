<?php
function base64url_encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
function base64url_decode($data)
{
    return base64_decode(strtr($data, '-_', '+/'));
}
function jwt_encode($payload, $secret)
{
    $header = ['typ' => 'JWT', 'alg' => 'HS256'];
    $segments = [];
    $segments[] = base64url_encode(json_encode($header));
    $segments[] = base64url_encode(json_encode($payload));
    $signing_input = implode('.', $segments);
    $signature = hash_hmac('sha256', $signing_input, $secret, true);
    $segments[] = base64url_encode($signature);
    return implode('.', $segments);
}
function jwt_decode($jwt, $secret)
{
    $parts = explode('.', $jwt);
    if (count($parts) !== 3) return false;
    list($header64, $payload64, $sig64) = $parts;
    $header = json_decode(base64url_decode($header64), true);
    $payload = json_decode(base64url_decode($payload64), true);
    $signature = base64url_decode($sig64);
    $valid_sig = hash_hmac('sha256', "$header64.$payload64", $secret, true);
    if (!hash_equals($signature, $valid_sig)) return false;
    if (isset($payload['exp']) && time() > $payload['exp']) return false;
    return $payload;
}

$secret_key = "LaCléDeLaPorte";
if (!isset($_COOKIE['token']) || !jwt_decode($_COOKIE['token'], $secret_key)) {
    header("Location: ./secu/log.php");
    exit;
}
header("Location: ../menu.php");
