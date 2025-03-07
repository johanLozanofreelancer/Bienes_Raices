<?php

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header ('Location: /');
    };


    require 'includes/config/databases.php';
    $db = conectarDB();

    $consulta = "SELECT * FROM propiedades WHERE id = {$id}";
    $resultado = mysqli_query($db, $consulta);

    if($resultado->num_rows === 0) {
        header ('Location: /');
    }

    //validar que la propiedad existe en la BD, sino, redirigir al usuario a inicio


    $propiedad = mysqli_fetch_assoc($resultado);


    require 'includes/funciones.php';
    incluirTemplate('header');
?>



    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'];?></h1>
    
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="imagen de la propiedad">
    
        <div class="resumen-propiedad">
            <p class="precio">€<?php echo $propiedad['precio'];?></p>

            <ul class="iconos-caracteristicas">
                <li >
                    <img  class="icono" loading="lazy" src="build/img/icono_wc.svg"alt="icono del WC">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>    
                <li >
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg"alt="icono de habitacion">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>    
                <li >
                    <img class="icono"  loading="lazy" src="build/img/icono_estacionamiento.svg"alt="icono del estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion'];?></p>
        </div>
    </main>

<?php
    mysqli_close($db);

    incluirTemplate('footer');
?>