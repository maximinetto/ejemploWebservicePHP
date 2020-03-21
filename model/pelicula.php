<?php

    require_once('audiovisual.php');

    class Film extends AudioVisual{

        public function __construct($array)
        {
            parent::__construct($array);
        }

        public function __construct1($idFilm, $title, $year, $img)
        {
            parent::__construct($idFilm, $title, $year, $img);
        }

        public function tipo(){
            return "Película";
        }
        
    }

?>