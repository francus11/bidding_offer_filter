<?php
define('CLIENT_ID', 'f51f6cffd2034520bb25c214a83d4896'); // wprowadź Client_ID aplikacji

function createLinkWithParams($url, $params)
{
    $url .= '?' . http_build_query($params);
    return $url;
}

function main()
{
    $url = "https://allegro.pl.allegrosandbox.pl/auth/oauth/authorize";
    $id = CLIENT_ID;
    $link = "http://localhost/src/auth/create_user_token.php";
    $params = array(
        "response_type" => "code", 
        "client_id" => $id, 
        "redirect_uri" => $link);
    $redirectLink = createLinkWithParams($url, $params);
    header("Location: $redirectLink");
}

main();