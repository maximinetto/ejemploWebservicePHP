<?php

require_once ('vendor/autoload.php');
require_once 'model/pelicula.php';

const URL = 'http://www.omdbapi.com';
const APIKEY = 'e9aefa8c';

function listado()
{                                                          //urlencode codifica carácteres extraños             
    $texto_busqueda = isset($_POST['txtbuscar']) ? urlencode($_POST['txtbuscar']) : "pulp" ;

    $client = new GuzzleHttp\Client();
    $response = $client->get(URL, [
        'query' => ['s' => $texto_busqueda, 'apikey' => APIKEY]
    ]);
    $json_response = json_decode($response->getBody(), true);
    $films = $json_response["Search"];
    return $films;
}


?>