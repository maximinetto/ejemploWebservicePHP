<?php

require_once '../controller/c_audiovisual.php';

$idVideo = $_REQUEST["idVideo"];

if (isset($idVideo)) {
    $audioVisual = getFilm($idVideo);
?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Películas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/main.css" />
    </head>
    <body>
        <main class="container">
            <div class="row m-5">
                <h2>Título: <?php echo $audioVisual->getTitle() ?></h2>                
            </div>

            <div class="row m-3"> 
                <img src=<?php echo $audioVisual->getPoster() ?> alt="foto"/>
            </div>
            <div>
                <h4>Director: </h4> <span> <?php echo $audioVisual->getDirector() ?> </span>
            </div>
            <div>
                <h4>Actores: </h4> <span> <?php echo $audioVisual->getActors() ?> </span>
            </div>
            <div>
                <h4>Duración: </h4> <span> <?php echo $audioVisual->getRuntime() ?> </span>
            </div>
            <div>
                <h4>Año: </h4> <span> <?php echo $audioVisual->getYear() ?> </span>
            </div>
            <div class="rating">
                <h4>Ratings: </h4> 
                <div >
                    
                    <?php 
                    $ratings = $audioVisual->getRankings();
                    foreach ($ratings as $key => $rating) {
                    
                    ?>
                    <p> 
                        
                    
                    <?php echo $rating["Source"] ?> 
                    
                    <span> <?php echo $rating["Value"] ?></span> 
                    </p>
                    <?php
                    }
                    ?> 
                </div>
            </div>
            <div>
                <h4>Género: </h4> <span> <?php echo $audioVisual->getGenre() ?> </span>
            </div>
            <div>
                <h4>Tipo: </h4> <span> <?php echo $audioVisual->tipo() ?> </span>
            </div>
        </main>
    </body>
    </html>

<?php
}
?>