<?php

require ('../vendor/autoload.php');
require_once '../model/pelicula.php';
require_once '../model/helpers/audiovisual_converter.php';

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
    if(isset($json_response["Error"])){
        return $json_response["Error"];
    }
    else{

        $films = $json_response["Search"];
        return $films;
    }
}

function getFilm(string $idVideo){
    
    $converter = new AudioVisualConverter($idVideo, APIKEY);
    $audiovisual = $converter();
    return $audiovisual;
}

?>