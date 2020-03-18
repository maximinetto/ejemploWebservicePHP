<?php

require_once '../controller/c_audiovisual.php';

$idVideo = $_REQUEST["idVideo"];

if (isset($idVideo)) {

    $audioVisual = getFilm($idVideo);
    var_dump($audioVisual);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Película</title>
    </head>

    <body>

    </body>

    </html>

<?php
}
?>