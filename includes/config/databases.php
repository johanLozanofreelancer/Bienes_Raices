<?php 

function conectarDB() {
    $db = mysqli_connect('localhost', 'root', '2207', 'bienesraices_crud');

    if(!$db) {
        echo 'Error, no se conectó';
        exit;
    }

    return $db;
}