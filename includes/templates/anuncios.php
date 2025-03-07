<?php

    //importar la base de datos
    require 'includes/config/databases.php';
    $db = conectarDB();

    //consultar en la base de datos

    $query = "SELECT * FROM propiedades LIMIT {$limite};";

    //obtener los resultados
    $resultado = mysqli_query($db, $query);

?>


<div class="contenedor-anuncios ">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado) )  : ?>
    <div class="anuncio" >
        <picture>
            
            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen del anuncio">
        </picture>
        <div class="contenido-anuncio">
            <h3> <?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio">€<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li >
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg"alt="icono del WC">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>    
                <li >
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg"alt="icono de habitacion">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>    
                <li >
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg"alt="icono del estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>

        </div> <!--contenido-anuncio-->
    </div> <!-- .Anuncio-->
    <?php endwhile; ?>
</div><!--contenedor-anuncios-->

<?php 
    //cerrar la conexion a la BD
?>