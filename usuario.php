<?php

// Importar la conexión 
require "includes/config/databases.php";
$db = conectarDB();

// Crear Email y Password
$email = "lozano@correo.com";
$password = "123456789";
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//Query para crear al usuario
$query  = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}')";

//agregarlo a la base de datos
mysqli_query($db, $query);
