<?php
require_once 'controller/c_audiovisual.php';
require_once 'functions.php';
$response = listado();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <div class="container">
        <div class="row m-5">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Buscar</label>
                    <input type="text" class="form-control" id="txtbuscar" name="txtbuscar" 
                    placeholder="Ingresa el título">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
        <?php 
        if(is_array($response)){
            $audiovisuales = $response;
        ?>
        <div class="row">

            <?php

            $index = 0;
            
            
            foreach ($audiovisuales as $key => $value) {
                $img = $value["Poster"];
                $year = $value["Year"];
                $title = $value["Title"];
                $id = $value["imdbID"];
            ?>
                <div class="col">
                    <div class="card film" id=<?php echo $id; ?> style="width: 18rem;">
                        <img src=<?php echo $img; ?> class="card-img-top" alt=<?php echo $title; ?>>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $year . " - " . $title . "<br>"; ?>
                            </h5>
                        </div>
                    </div>
                </div>

                <?php



                ?>


            <?php

                $index++;
                $espacioAgregado = agregarEspaciado($index);
                if ($espacioAgregado) {
                    $index = 0;
                }
            }
        }
        else{
         ?>

            <p>No hay resultados</p>
            <p>Razón: <?php echo $response; ?></p>
        <?php
            }
        ?>    
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/main.js"> </script>       
</body>

</html>