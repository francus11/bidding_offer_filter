<?php

require_once 'AppController.php';

include 'src/auth/credentials_allegro.php';

class APIController extends AppController
{
    private $tokenUser = ALLEGRO_TOKEN_USER;


    public function __construct()
    {
        parent::__construct();
    }

    public function api($uri)
    {
        if (method_exists($this, $uri)) {
            // Wywołujemy daną metodę
            $this->$uri();
        } else {
            // Obsługa błędu, jeśli metoda nie istnieje
            echo "error - method doesn't exist";
        }
    }

    public function cat()
    {
        $params = array(
            "name" => $_GET['string']
        );

        $header = array(
            'Accept: application/vnd.allegro.public.v1+json',
            "Authorization: Bearer $this->tokenUser"
        );

        $url = "https://api." . ALLEGRO_ADDRESS . "/sale/matching-categories";

        $this->request($url, $params, $header);
    }

    public function parameters()
    {
        $category = $_GET['categoryId'];

        $header = array(
            'Accept: application/vnd.allegro.public.v1+json',
            "Authorization: Bearer $this->tokenUser"
        );

        $url = "https://api." . ALLEGRO_ADDRESS . "/sale/categories/".$category."/parameters";

        $this->request($url, [], $header);
    }

    private function createLinkWithParams($url, $params)
    {
        $url .= '?' . http_build_query($params);
        return $url;
    }

    private function getCurl($headers, $url, $content = null)
    {
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

    private function request($url, array $params, array $headers)
    {
        $url = $this->createLinkWithParams($url, $params);
        $ch = $this->getCurl($headers, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        echo $result;
    }
}
