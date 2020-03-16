<?php 

function agregarEspaciado($index): bool{
    if($index == 2) 
    {
        echo '<div class="w-100 espacio"></div>';
        return true;
    }

    return false;
}