<?php 

function conectarDB() {

    $db = new mysqli('\\wsl.localhost', 'root', 'root', 'Bienes_Raices');

    if(!$db) {
        echo 'Error, no se conectó';
        exit;
    }

    return $db;
}
