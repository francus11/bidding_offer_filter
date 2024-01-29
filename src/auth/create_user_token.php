<?php
include __DIR__ . '/credentials_allegro.php';
function createLinkWithParams($url, $params)
{
    $url .= '?' . http_build_query($params);
    return $url;
}
function getCurl($headers, $url, $content = null) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true
    ));
    if ($content !== null) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
    }
    return $ch;
}

function request() {
    $token = CLIENT_ID . ":" . CLIENT_SECRET;
    $token = base64_encode($token);
    $url = "https://allegro.pl.allegrosandbox.pl/auth/oauth/token";
    $redirect = "http://localhost/src/auth/create_user_token.php";
    $headers = array("Authorization: Basic {$token}");
    $content = array(
        "grant_type" => "authorization_code",
        "code" => $_GET['code'],
        "redirect_uri" => $redirect
    );
    $url = createLinkWithParams($url, $content); 
    $ch = getCurl($headers, $url);
    $result = curl_exec($ch);
    //var_dump($result);
    $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($result === false || $resultCode !== 200) {
        exit ("Something went wrong ". $resultCode);
    }
    $json = json_decode($result);
    
    echo $json->access_token;
}

request();

