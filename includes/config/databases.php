<?php 

function conectarDB() {

    $db = mysqli_connect('\\wsl.localhost', 'root', 'root', 'Bienes_Raices');

    if(!$db) {
        echo 'Error, no se conectó';
        exit;
    }

    return $db;
}
